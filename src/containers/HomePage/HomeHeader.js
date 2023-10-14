import React, { Component } from "react";
import { connect } from "react-redux";
import "./HomeHeader.scss";
import { NavLink } from "react-router-dom";
import banner from "../../assets/img/banner/1.jpg";
class HomeHeader extends Component {
  render() {
    return (
      <>
        {/* <header className="fixed-top">
          <div className="container">
            <nav className="navMasterwork navbar navbar-expand-lg navbar-light">
              <NavLink className="navbar-brand" to="#">
                <i className="fa fa-handshake" />
                Masterwork
              </NavLink>
              <button
                className="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarMasterwork"
                aria-controls="navbarMasterwork"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <i className="fa icon-expand fa-bars" id="btnOpen" />
                <i
                  className="fa icon-close fa-times"
                  id="btnClose"
                  style={{ display: "none" }}
                />
              </button>
              <div className="collapse navbar-collapse" id="navbarMasterwork">
                <ul className="navbar-nav ml-lg-auto">
                  <li className="nav-item active">
                    <NavLink className="nav-link" to="index.html">
                      Chuyên khoa
                    </NavLink>
                  </li>
                  <li className="nav-item">
                    <NavLink className="nav-link" to="about.html">
                      Cơ sở y tế
                    </NavLink>
                  </li>
                  <li className="nav-item">
                    <NavLink className="nav-link" to="./services.html">
                      Bác sĩ
                    </NavLink>
                  </li>
                  <li className="nav-item">
                    <NavLink className="nav-link" to="./contact.html">
                      Gói khám
                    </NavLink>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </header>

        <section className="carousel">
          <div className="carousel__content">
            <div className="container">
              <div className="row align-items-center">
                <div className="col-lg-6 col-12 carousel__content__left">
                  <h2>Chăm sóc bạn, từ trái tim đến sức khỏe</h2>
                  <p className="mt-3 mb-4 mb-lg-5">
                    Với sự tận tâm và chuyên môn, chúng tôi đồng hành cùng bạn
                    trên mỗi bước đi của cuộc hành trình sức khỏe
                  </p>
                  <button type="button" className="btn">
                    Đặt lịch ngay
                  </button>
                </div>
                <div className="col-12 col-lg-6 carousel__content__right">
                  <img className="img-fluid" src={banner} alt="main-img" />
                </div>
              </div>
            </div>
          </div>
        </section> */}
      </>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    isLoggedIn: state.user.isLoggedIn,
  };
};

const mapDispatchToProps = (dispatch) => {
  return {};
};

export default connect(mapStateToProps, mapDispatchToProps)(HomeHeader);
