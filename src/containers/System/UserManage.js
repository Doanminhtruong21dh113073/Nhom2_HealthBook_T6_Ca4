import React, { Component } from "react";
import { connect } from "react-redux";
import "./UserManage.scss";
import {
  getAllUsers,
  createNewUserServices,
  deleteUserService,
  editUserService,
} from "../../services/userServiece";
import ModalUser from "./ModalUser";
import ModalEditUser from "./ModalEditUser";
import { emitter } from "../../utils/emitter";

class UserManage extends Component {
  constructor(props) {
    super(props);
    this.state = {
      arrUsers: [],
      isOpenModalUser: false,
      isOpenModelEditUser: false,
      userEdit: {},
    };
  }
  async componentDidMount() {
    await this.getAllUsersFromReact();
  }

  getAllUsersFromReact = async () => {
    let response = await getAllUsers("ALL");
    if (response && response.errCode === 0) {
      this.setState({
        arrUsers: response.users,
      });
    }
  };

  handleAddNewUser = () => {
    this.setState({
      isOpenModalUser: true,
    });
  };

  toggleUserModal = () => {
    this.setState({
      isOpenModalUser: !this.state.isOpenModalUser,
    });
  };

  toggleUserEditModal = () => {
    this.setState({
      isOpenModelEditUser: !this.state.isOpenModelEditUser,
    });
  };

  createNewuser = async (data) => {
    try {
      let response = await createNewUserServices(data);
      if (response && response.errCode !== 0) {
        alert(response.errMessage);
      } else {
        await this.getAllUsersFromReact();
        this.setState({
          isOpenModalUser: false,
        });

        emitter.emit("EVENT_CLEAR_MODAL_DATA");
      }
    } catch (e) {
      console.log(e);
    }
  };

  handleDeleteUser = async (user) => {
    try {
      let res = await deleteUserService(user.id);
      if (res && res.errCode === 0) {
        await this.getAllUsersFromReact();
      } else {
        alert(res.errMessage);
      }
    } catch (e) {
      console.log(e);
    }
  };

  handleEditUser = async (user) => {
    console.log("check edit user", user);
    this.setState({
      isOpenModelEditUser: true,
      userEdit: user,
    });
  };

  // doEditUser = async (user) => {
  //   try {
  //     let res = await editUserService(user);
  //     if (res && res.errCode === 0) {
  //       this.setState({
  //         isOpenModelEditUser: false,
  //       });

  //       await this.getAllUsersFromReact();
  //     } else {
  //       alert(res.errCode);
  //     }
  //   } catch (e) {
  //     console.log(e);
  //   }
  // };

  doEditUser = async (user) => {
    try {
      if (!user || (!user.firstName && !user.lastName && !user.address)) {
        // Kiểm tra xem thông tin người dùng hợp lệ hay không
        alert(user.errMessage);
        return;
      }

      let res = await editUserService(user);

      // Tiếp tục xử lý dựa trên kết quả từ editUserService
      if (res && res.errCode === 0) {
        this.setState({
          isOpenModelEditUser: false,
        });

        await this.getAllUsersFromReact();
      } else {
        alert(res.errCode);
      }
    } catch (e) {
      console.log(e);
    }
  };

  render() {
    let arrUsers = this.state.arrUsers;
    return (
      <div className="container-fluid">
        <ModalUser
          isOpen={this.state.isOpenModalUser}
          toggleUserModal={this.toggleUserModal}
          createNewuser={this.createNewuser}
        />
        {this.state.isOpenModelEditUser && (
          <ModalEditUser
            isOpen={this.state.isOpenModelEditUser}
            toggleUserModal={this.toggleUserEditModal}
            currentUser={this.state.userEdit}
            editUser={this.doEditUser}
          />
        )}
        <div>
          <h1>Manage users</h1>
        </div>
        <div className="mx-1">
          <button
            className="btn btn-outline-primary"
            onClick={() => this.handleAddNewUser()}
          >
            + Add new users
          </button>
        </div>
        <div>
          <table className="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Email</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              {arrUsers &&
                arrUsers.map((item, index) => {
                  return (
                    <tr key={index}>
                      <td>{item.id}</td>
                      <td>{item.email}</td>
                      <td>{item.firstName}</td>
                      <td>{item.lastName}</td>
                      <td>{item.address}</td>
                      <td>
                        <button
                          type="button"
                          className="btn btn-outline-warning"
                          onClick={() => this.handleEditUser(item)}
                        >
                          Edit
                        </button>
                        <button
                          type="button"
                          className="btn btn-outline-danger"
                          onClick={() => this.handleDeleteUser(item)}
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                  );
                })}
            </tbody>
          </table>
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

export default connect(mapStateToProps, mapDispatchToProps)(UserManage);
