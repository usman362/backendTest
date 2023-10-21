import React, {Component} from 'react';

export default class Header extends Component {
    render(){
        return (
            <div className="header">
            <div className="header-left">
              <a href="dashboard" className="logo">
                <img src="https://smarthr.dreamguystech.com/codeigniter/template/blue/public/assets/img/logo.png" width={40} height={40} alt="" />
              </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0)">
              <span className="bar-icon">
                <span />
                <span />
                <span />
              </span>
            </a>
            <div className="page-title-box">
              <h3>Dashboard</h3>
            </div>
            <a id="mobile_btn" className="mobile_btn" href="#sidebar"><i className="fa fa-bars" /></a>
          </div>
        )
    }
}
