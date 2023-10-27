import React, { Component } from "react";
import { FormattedMessage } from "react-intl";
import { connect } from "react-redux";
import { getAllCodeService } from "../../../services/userServiece";
import { LANGUAGES } from "../../../utils";
import { reject } from "lodash";

class UserRedux extends Component {
  constructor(props) {
    super(props);
    this.state = {};
  }

  async componentDidMount() {
    try {
      let res = await getAllCodeService("gender");
      if (res && res.errCode === 0) {
        this.setState({
          genderArr: res.data,
        });
      }
    } catch (e) {
      console.log(e);
    }
  }

  render() {
    console.log(this.state);
    let genders = this.state.genderArr;
    let language = this.props.language;
    return (
      <div className="user-redux-container">
        <div className="title">
          <FormattedMessage id="manage-user.add" />
        </div>
        <div className="user-redux-body">
          <div className="container">
            <div className="row">
              <form>
                <div className="form-row">
                  <div className="form-group col-md-6">
                    <label htmlFor="inputEmail4">
                      <FormattedMessage id="manage-user.email" />
                    </label>
                    <input
                      type="email"
                      className="form-control"
                      placeholder="Email"
                    />
                  </div>
                  <div className="form-group col-md-6">
                    <label htmlFor="inputPassword4">
                      <FormattedMessage id="manage-user.password" />
                    </label>
                    <input
                      type="password"
                      className="form-control"
                      placeholder="Password"
                    />
                  </div>
                </div>
                <div className="form-group">
                  <label htmlFor="inputAddress">
                    <FormattedMessage id="manage-user.firstName" />
                  </label>
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Enter your first name"
                  />
                </div>
                <div className="form-group">
                  <label htmlFor="inputAddress2">
                    <FormattedMessage id="manage-user.lastName" />
                  </label>
                  <input
                    type="text"
                    className="form-control"
                    placeholder="Enter your last name"
                  />
                </div>
                <div className="form-row">
                  <div className="form-group col-md-3">
                    <label htmlFor="inputCity">
                      <FormattedMessage id="manage-user.phone" />
                    </label>
                    <input type="number" className="form-control" />
                  </div>
                  <div className="form-group col-md-7">
                    <label htmlFor="inputZip">
                      <FormattedMessage id="manage-user.address" />
                    </label>
                    <input type="text" className="form-control" />
                  </div>
                  <div className="form-group col-md-2">
                    <label>
                      <FormattedMessage id="manage-user.gender" />
                    </label>
                    <select className="form-control">
                      {genders &&
                        genders.length > 0 &&
                        genders.map((item, index) => {
                          return (
                            <option key={index}>
                              {language === LANGUAGES.VI
                                ? item.valueVi
                                : item.valueEn}
                            </option>
                          );
                        })}
                    </select>
                  </div>
                  <div className="form-group col-md-3">
                    <label htmlFor="inputState">
                      <FormattedMessage id="manage-user.position" />
                    </label>
                    <select className="form-control" defaultValue="position1">
                      <option value="position1">Male</option>
                      <option value="position2"></option>
                    </select>
                  </div>
                  <div className="form-group col-md-3">
                    <label htmlFor="inputState">
                      <FormattedMessage id="manage-user.roleId" />
                    </label>
                    <select className="form-control" defaultValue="role1">
                      <option value="role1">Male</option>
                      <option value="role2"></option>
                    </select>
                  </div>
                  <div className="form-group col-md-3">
                    <label htmlFor="inputState">
                      <FormattedMessage id="manage-user.image" />
                    </label>
                    <input type="text" className="form-control" />
                  </div>
                </div>
                <button type="submit" className="btn btn-primary">
                  <FormattedMessage id="manage-user.submit" />
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

const mapStateToProps = (state) => {
  return {};
};

const mapDispatchToProps = (dispatch) => {
  return {};
};

export default connect(mapStateToProps, mapDispatchToProps)(UserRedux);
