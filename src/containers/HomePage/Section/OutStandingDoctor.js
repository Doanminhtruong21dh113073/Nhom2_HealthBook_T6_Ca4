import React, { Component } from "react";
import { connect } from "react-redux";
import "./OutStandingDoctor.scss";
import { FormattedMessage } from "react-intl";

import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

class section extends Component {
  render() {
    return (
      <div className="section-share section-outstanding-doctor">
        <div className="section-container">
          <div className="section-header">
            <span className="title-section"> Bác sĩ nổi bật tuần qua</span>
            <button className="btn-section btn btn-md btn-light effect">
              Xêm thêm
            </button>
          </div>
          <div className="section-body">
            <Slider {...this.props.settings}>
              <div className="section-customize">
                <div className="outer-bg">
                  <div className="bg-image section-outstanding-doctor"></div>
                </div>
                <div>
                  <div> Giáo sư tiến sĩ Rốt 1</div>
                  <div>Cơ xương khớp 1</div>
                </div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-outstanding-doctor"></div>

                <div> Giáo sư tiến sĩ Rốt 2</div>
                <div>Cơ xương khớp 2</div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-outstanding-doctor"></div>

                <div> Giáo sư tiến sĩ Rốt 3</div>
                <div>Cơ xương khớp 3</div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-outstanding-doctor"></div>

                <div> Giáo sư tiến sĩ Rốt 4</div>
                <div>Cơ xương khớp 4</div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-outstanding-doctor"></div>

                <div> Giáo sư tiến sĩ Rốt 5</div>
                <div>Cơ xương khớp 5</div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-outstanding-doctor"></div>

                <div> Giáo sư tiến sĩ Rốt 6</div>
                <div>Cơ xương khớp 6</div>
              </div>
            </Slider>
          </div>
        </div>
      </div>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    isLoggedIn: state.user.isLoggedIn,
    language: state.app.language,
  };
};

const mapDispatchToProps = (dispatch) => {
  return {};
};

export default connect(mapStateToProps, mapDispatchToProps)(section);
