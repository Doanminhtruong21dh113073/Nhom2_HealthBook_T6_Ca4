import "../../assets/css/animate.css";
import "../../assets/css/bootsnav.css";

import React, { Component, Fragment } from "react";
import { connect } from "react-redux";
import "./HomeHeader.scss";
import logo from "../../assets/img/logo-light.png";
import logo2 from "../../assets/img/logo.png";
import banner from "../../assets/img/doctor-2.png";
import { FormattedMessage } from "react-intl";
import { LANGUAGES } from "../../utils/constant.js";
import { changeLanguageApp } from "../../store/actions/appActions";
import { NavLink, Link } from "react-router-dom";

class HomeHeader extends Component {
  changeLanguage = (language) => {
    //fire redux event : actions
    this.props.changeLanguageAppRedux(language);
  };

  render() {
    let language = this.props.language;

    return (
      <Fragment>
        {/* START HEADER TOP */}
        <div className="top-bar-area">
          <div className="container">
            <div className="row align-center">
              <div className="col-lg-3 logo">
                <NavLink to="index.html">
                  <img src={logo} className="logo" alt="Logo" />
                </NavLink>
              </div>
              <div className="col-lg-9 address-info text-right">
                <div className="info box">
                  <ul>
                    <li>
                      <div className="icon">
                        <i className="fas fa-hospital"></i>
                      </div>
                      <div className="info">
                        <span>
                          <FormattedMessage id="homeheader.speciality" />
                        </span>{" "}
                        <FormattedMessage id="homeheader.searchdoctor" />
                      </div>
                    </li>
                    <li>
                      <div className="icon">
                        <i className="fas fa-procedures" />
                      </div>
                      <div className="info">
                        <span>
                          <FormattedMessage id="homeheader.health-facility" />
                        </span>
                        <FormattedMessage id="homeheader.select-room" />
                      </div>
                    </li>
                    <li>
                      <div className="icon">
                        <i className="fas fa-user-md" />
                      </div>
                      <div className="info">
                        <span>
                          {" "}
                          <FormattedMessage id="homeheader.doctor" />
                        </span>
                        <FormattedMessage id="homeheader.select-doctor" />
                      </div>
                    </li>
                  </ul>

                  <div className="right-content">
                    <div className="support">
                      <i className="fas fa-question-circle"> </i>
                      <FormattedMessage id="homeheader.support" />
                    </div>
                    <div
                      className={
                        language === LANGUAGES.VI
                          ? "language-vi active"
                          : "language-vi"
                      }
                    >
                      <span onClick={() => this.changeLanguage(LANGUAGES.VI)}>
                        VN
                      </span>
                    </div>
                    <div
                      className={
                        language === LANGUAGES.EN
                          ? "language-en active"
                          : "language-en"
                      }
                    >
                      <span onClick={() => this.changeLanguage(LANGUAGES.EN)}>
                        EN
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {/* END START HEADER TOP */}

        {/* HEADER */}
        <header>
          <div container box-nav>
            <div className="row">
              {/* START NAV */}
              <nav
                id="mainNav"
                className="navbar logo-less top-less navbar-default navbar-fixed white bootsnav on no-full nav-box no-background"
              >
                <div className="container">
                  {/* Start Atribute Navigation */}
                  <div className="attr-nav contact">
                    <ul>
                      <li>
                        <i className="fas fa-stethoscope"></i>
                        <p>
                          Emergency <span>0934328213</span>
                        </p>
                      </li>
                    </ul>
                  </div>
                  {/* End Atribute Navigation */}

                  {/*  Start Header Navigation */}
                  <div className="navbar-header">
                    <button
                      type="button"
                      className="navbar-toggle"
                      data-toggle="collapse"
                      data-target="#navbar-menu"
                    >
                      <i className="fa fa-bars"></i>
                    </button>
                    <NavLink className="navbar-brand" to="#">
                      <img src={logo2} className="logo" alt="Logo" />
                    </NavLink>
                  </div>
                  {/*  End Header Navigation */}

                  {/* Collect the nav links, forms, and other content for toggling */}
                  <div className="collapse navbar-collapse " id="navbar-menu">
                    <ul
                      className="nav navbar-nav navbar-left dropdown"
                      data-in="fadeInDown"
                      data-out="fadeOutUp"
                    >
                      <li>
                        <Link to="/">
                          <FormattedMessage id="banner.child1" />
                        </Link>
                      </li>
                      <li>
                        <Link to="/about">
                          <FormattedMessage id="banner.child2" />
                        </Link>
                      </li>
                      <li>
                        <Link to="/departments">
                          <FormattedMessage id="banner.child3" />
                        </Link>
                      </li>
                      <li>
                        <Link to="/doctors">
                          <FormattedMessage id="banner.child4" />
                        </Link>
                      </li>
                      <li>
                        <Link to="/blog">
                          <FormattedMessage id="banner.child5" />
                        </Link>
                      </li>
                      <li>
                        <Link to="/contact">
                          <FormattedMessage id="banner.child6" />
                        </Link>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
              {/* END NAV */}
            </div>
          </div>
        </header>
        {/* END HEADER */}

        {/* START BANNER */}
        <div className="banner-area single-banner auto-height bg-gray">
          <div className="container">
            <div className="row align-center">
              <div className="col-lg-7">
                <div className="content">
                  <h2>Providing best medical care</h2>
                  <p>
                    Ladies she basket season age her uneasy saw. Discourse
                    unwilling am no described dejection incommode no listening
                    of. Before nature his parish boy.
                  </p>
                  <button className="btn btn-md btn-gradient" href="#">
                    Discover More
                  </button>
                  <button className="btn btn-md btn-light effect" href="#">
                    Contact Us <i className="fas fa-angle-right" />
                  </button>
                </div>
              </div>
              <div className="col-lg-5 thumbs">
                <img src={banner} alt="Thumb" />
              </div>
            </div>
          </div>
        </div>

        {/* END BANNER */}
      </Fragment>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    isLoggedIn: state.user.isLoggedIn,
    userInfo: state.user.userInfo,
    language: state.app.language,
  };
};

const mapDispatchToProps = (dispatch) => {
  return {
    changeLanguageAppRedux: (language) => dispatch(changeLanguageApp(language)),
  };
};

export default connect(mapStateToProps, mapDispatchToProps)(HomeHeader);
