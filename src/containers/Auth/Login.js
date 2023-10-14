import React, { Component } from "react";
import { connect } from "react-redux";
import { push } from "connected-react-router";
import * as actions from "../../store/actions";

import "./Login.scss";
import { handleLoginApi } from "../../services/userServiece";

class Login extends Component {
  constructor(props) {
    super(props);
    this.state = {
      username: "",
      password: "",
      isShowPasword: false,
      errMessage: "",
    };
  }

  handleOnChangeInput = (event) => {
    const { name, value } = event.target;
    this.setState({
      [name]: value,
    });
    console.log(event.target.value);
  };

  handleLogin = async () => {
    this.setState({
      errMessage: "",
    });

    try {
      let data = await handleLoginApi(this.state.username, this.state.password);
      if (data && data.errMessage !== 0) {
        this.setState({
          errMessage: data.message,
        });
      }
      if (data && data.errCode === 0) {
        this.props.userLoginSuccess(data.user);
      }
    } catch (error) {
      if (error.response) {
        if (error.response.data) {
          this.setState({
            errMessage: error.response.data.message,
          });
        }
      }
    }
  };

  handleShowHidePasword = () => {
    this.setState({
      isShowPasword: !this.state.isShowPasword,
    });
  };

  render() {
    return (
      <React.Fragment>
        <div className="login-background">
          <div className="login-container">
            <div className="login-content row">
              <div className="col-12 text-login">Login</div>
              <div className=" col-12 form-group login-input">
                <label>Username:</label>
                <input
                  type="text"
                  className="form-control"
                  placeholder="Enter your username"
                  name="username"
                  value={this.state.username}
                  onChange={(event) => this.handleOnChangeInput(event)}
                ></input>
              </div>
              <div className=" col-12 form-group login-input">
                <label>Password:</label>
                <div className="custom-input-password">
                  <input
                    type={this.state.isShowPasword ? "text" : "password"}
                    className="form-control"
                    placeholder="Enter your password"
                    name="password"
                    value={this.state.password}
                    onChange={(event) => this.handleOnChangeInput(event)}
                  ></input>
                  <span
                    onClick={() => {
                      this.handleShowHidePasword();
                    }}
                  >
                    <i
                      className={
                        this.state.isShowPasword
                          ? "far fa-eye"
                          : "fas fa-eye-slash"
                      }
                    ></i>
                  </span>
                </div>
              </div>

              <div className="col-12" style={{ color: "red" }}>
                {this.state.errMessage}
              </div>

              <div className="col-12">
                <button
                  className="btn-login"
                  onClick={() => {
                    this.handleLogin();
                  }}
                >
                  Login
                </button>
              </div>
              <div className="col-12">
                <span className="forgot-password">Forgot your password</span>
              </div>
              <div className="col-12 text-center mt-3">
                <span className="text-other-login">Or login with</span>
              </div>
              <div className="col-12 social-login">
                <i className="fab fa-google google"></i>
                <i className="fab fa-facebook-f facebook"></i>
              </div>
            </div>
          </div>
        </div>
      </React.Fragment>
    );
  }
}

const mapStateToProps = (state) => {
  return {
    language: state.app.language,
  };
};

const mapDispatchToProps = (dispatch) => {
  return {
    navigate: (path) => dispatch(push(path)),
    userLoginSuccess: (userInfor) =>
      dispatch(actions.userLoginSuccess(userInfor)),
  };
};

export default connect(mapStateToProps, mapDispatchToProps)(Login);
