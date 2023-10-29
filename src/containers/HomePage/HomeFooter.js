import React, { Component } from "react";
import { connect } from "react-redux";
import { FormattedMessage } from "react-intl";

class HomeFooter extends Component {
  render() {
    return (
      <div className="home-footer">
        <footer className="bg-dark text-light">
          <div className="container">
            <div className="f-items default-padding">
              <div className="row">
                <div className="single-item col-lg-4 col-md-6 item">
                  <div className="f-item about">
                    <h4 className="widget-title">About Us</h4>
                    <p>
                      Required honoured trifling eat pleasure man relation.
                      Assurance yet bed was improving furniture man. Distrusts
                      delighted
                    </p>
                    <a className="btn btn-md left-icon btn-gradient" href="#">
                      <i className="fas fa-plus" /> Blood Bank
                    </a>
                    <div className="social">
                      <h5>Get Us:</h5>
                      <ul>
                        <li className="facebook">
                          <a href="#">
                            <i className="fab fa-facebook-f" />
                          </a>
                        </li>
                        <li className="twitter">
                          <a href="#">
                            <i className="fab fa-twitter" />
                          </a>
                        </li>
                        <li className="youtube">
                          <a href="#">
                            <i className="fab fa-youtube" />
                          </a>
                        </li>
                        <li className="instagram">
                          <a href="#">
                            <i className="fab fa-instagram" />
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div className="single-item col-lg-2 col-md-6 item">
                  <div className="f-item link">
                    <h4 className="widget-title">Department</h4>
                    <ul>
                      <li>
                        <a href="#">Medecine and Health</a>
                      </li>
                      <li>
                        <a href="#">Dental Care</a>
                      </li>
                      <li>
                        <a href="#">Eye Treatment</a>
                      </li>
                      <li>
                        <a href="#">Children Chare</a>
                      </li>
                      <li>
                        <a href="#">Traumatology</a>
                      </li>
                      <li>
                        <a href="#">X-ray</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="single-item col-lg-2 col-md-6 item">
                  <div className="f-item link">
                    <h4 className="widget-title">Usefull Links</h4>
                    <ul>
                      <li>
                        <a href="#">Ambulance</a>
                      </li>
                      <li>
                        <a href="#">Emergency</a>
                      </li>
                      <li>
                        <a href="#">Blog</a>
                      </li>
                      <li>
                        <a href="#">Project</a>
                      </li>
                      <li>
                        <a href="#">About Us</a>
                      </li>
                      <li>
                        <a href="#">Contact</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="single-item col-lg-4 col-md-6 item">
                  <div className="f-item branches">
                    <h4 className="widget-title">Our branches</h4>
                    <div className="branches">
                      <ul>
                        <li>
                          <strong>ACMH Hospital:</strong>
                          <span>
                            4992 Bryan Avenue, Prior Lake, Minnesota <br />
                            Phone: 651-379-4698
                          </span>
                        </li>
                        <li>
                          <strong>Central Hospital:</strong>
                          <span>
                            2001 Kia Magentis, Prior Lake, Minnesota <br />
                            Phone: 651-379-4698
                          </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {/* Footer Bottom */}
          <div className="footer-bottom">
            <div className="container">
              <div className="row align-center">
                <div className="col-lg-6">
                  <p>
                    © 2020 <strong>Clinicom</strong>. All Rights Reserved by
                    <a href="#">validtemplates</a>
                  </p>
                </div>
                <div className="col-lg-6 text-right link">
                  <ul>
                    <li>
                      <a href="#">Terms</a>
                    </li>
                    <li>
                      <a href="#">Privacy</a>
                    </li>
                    <li>
                      <a href="#">Support</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </footer>
        {/* End Footer*/}
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

export default connect(mapStateToProps, mapDispatchToProps)(HomeFooter);
