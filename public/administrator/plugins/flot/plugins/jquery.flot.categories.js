/* Flot plugin for plotting textual data or categoriess.

Copyright (c) 2007-2014 IOLA and Ole Laursen.
Licensed under the MIT license.

Consider a dataset like [["February", 34], ["March", 20], ...]. This plugin
allows you to plot such a dataset directly.

To enable it, you must specify mode: "categoriess" on the axis with the textual
labels, e.g.

    $.plot("#placeholder", data, { xaxis: { mode: "categoriess" } });

By default, the labels are ordered as they are met in the data series. If you
need a different ordering, you can specify "categoriess" on the axis options
and list the categoriess there:

    xaxis: {
        mode: "categoriess",
        categoriess: ["February", "March", "April"]
    }

If you need to customize the distances between the categoriess, you can specify
"categoriess" as an object mapping labels to values

    xaxis: {
        mode: "categoriess",
        categoriess: { "February": 1, "March": 3, "April": 4 }
    }

If you don't specify all categoriess, the remaining categoriess will be numbered
from the max value plus 1 (with a spacing of 1 between each).

Internally, the plugin works by transforming the input data through an auto-
generated mapping where the first category becomes 0, the second 1, etc.
Hence, a point like ["February", 34] becomes [0, 34] internally in Flot (this
is visible in hover and click events that return numbers rather than the
category labels). The plugin also overrides the tick generator to spit out the
categoriess as ticks instead of the values.

If you need to map a value back to its label, the mapping is always accessible
as "categoriess" on the axis object, e.g. plot.getAxes().xaxis.categoriess.

*/

(function ($) {
    var options = {
        xaxis: {
            categoriess: null
        },
        yaxis: {
            categoriess: null
        }
    };

    function processRawData(plot, series, data, datapoints) {
        // if categoriess are enabled, we need to disable
        // auto-transformation to numbers so the strings are intact
        // for later processing

        var xcategoriess = series.xaxis.options.mode === "categoriess",
            ycategoriess = series.yaxis.options.mode === "categoriess";

        if (!(xcategoriess || ycategoriess)) {
            return;
        }

        var format = datapoints.format;

        if (!format) {
            // FIXME: auto-detection should really not be defined here
            var s = series;
            format = [];
            format.push({ x: true, number: true, required: true, computeRange: true});
            format.push({ y: true, number: true, required: true, computeRange: true });

            if (s.bars.show || (s.lines.show && s.lines.fill)) {
                var autoScale = !!((s.bars.show && s.bars.zero) || (s.lines.show && s.lines.zero));
                format.push({ y: true, number: true, required: false, defaultValue: 0, computeRange: autoScale });
                if (s.bars.horizontal) {
                    delete format[format.length - 1].y;
                    format[format.length - 1].x = true;
                }
            }

            datapoints.format = format;
        }

        for (var m = 0; m < format.length; ++m) {
            if (format[m].x && xcategoriess) {
                format[m].number = false;
            }

            if (format[m].y && ycategoriess) {
                format[m].number = false;
                format[m].computeRange = false;
            }
        }
    }

    function getNextIndex(categoriess) {
        var index = -1;

        for (var v in categoriess) {
            if (categoriess[v] > index) {
                index = categoriess[v];
            }
        }

        return index + 1;
    }

    function categoriessTickGenerator(axis) {
        var res = [];
        for (var label in axis.categoriess) {
            var v = axis.categoriess[label];
            if (v >= axis.min && v <= axis.max) {
                res.push([v, label]);
            }
        }

        res.sort(function (a, b) { return a[0] - b[0]; });

        return res;
    }

    function setupcategoriessForAxis(series, axis, datapoints) {
        if (series[axis].options.mode !== "categoriess") {
            return;
        }

        if (!series[axis].categoriess) {
            // parse options
            var c = {}, o = series[axis].options.categoriess || {};
            if ($.isArray(o)) {
                for (var i = 0; i < o.length; ++i) {
                    c[o[i]] = i;
                }
            } else {
                for (var v in o) {
                    c[v] = o[v];
                }
            }

            series[axis].categoriess = c;
        }

        // fix ticks
        if (!series[axis].options.ticks) {
            series[axis].options.ticks = categoriessTickGenerator;
        }

        transformPointsOnAxis(datapoints, axis, series[axis].categoriess);
    }

    function transformPointsOnAxis(datapoints, axis, categoriess) {
        // go through the points, transforming them
        var points = datapoints.points,
            ps = datapoints.pointsize,
            format = datapoints.format,
            formatColumn = axis.charAt(0),
            index = getNextIndex(categoriess);

        for (var i = 0; i < points.length; i += ps) {
            if (points[i] == null) {
                continue;
            }

            for (var m = 0; m < ps; ++m) {
                var val = points[i + m];

                if (val == null || !format[m][formatColumn]) {
                    continue;
                }

                if (!(val in categoriess)) {
                    categoriess[val] = index;
                    ++index;
                }

                points[i + m] = categoriess[val];
            }
        }
    }

    function processDatapoints(plot, series, datapoints) {
        setupcategoriessForAxis(series, "xaxis", datapoints);
        setupcategoriessForAxis(series, "yaxis", datapoints);
    }

    function init(plot) {
        plot.hooks.processRawData.push(processRawData);
        plot.hooks.processDatapoints.push(processDatapoints);
    }

    $.plot.plugins.push({
        init: init,
        options: options,
        name: 'categoriess',
        version: '1.0'
    });
})(jQuery);
