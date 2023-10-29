import React, { Component } from "react";
import { connect } from "react-redux";
import "./MedicalFacility.scss";
import { FormattedMessage } from "react-intl";

import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

class section extends Component {
  render() {
    return (
      <div className="section-share section-medical-facility">
        <div className="section-container">
          <div className="section-header">
            <span className="title-section"> Cơ sở y tế nổi bật</span>
            <button className="btn-section btn btn-md btn-light effect">
              Xêm thêm
            </button>
          </div>
          <div className="section-body">
            <Slider {...this.props.settings}>
              <div className="section-customize">
                <div className="bg-image section-medical-facility"></div>
                <div> Hệ thống y tế 1</div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-medical-facility"></div>
                <div> Hệ thống y tế 2</div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-medical-facility"></div>
                <div> Hệ thống y tế 3</div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-medical-facility"></div>
                <div> Hệ thống y tế 4</div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-medical-facility"></div>
                <div> Hệ thống y tế 5</div>
              </div>
              <div className="section-customize">
                <div className="bg-image section-medical-facility"></div>
                <div> Hệ thống y tế 6</div>
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
