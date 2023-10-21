import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import '@fortawesome/fontawesome-free/css/all.min.css';

export default class Sidebar extends Component {
    render() {
        return (
           // <Router>
            <div className="sidebar" id="sidebar">
                <div className="sidebar-inner slimscroll">
                    <div id="sidebar-menu" className="sidebar-menu">
                        <ul>
                            <li className="menu-title">
                                <span>Attendance</span>
                            </li>
                            <li className="submenu">
                                <a href="##"><i className="fa fa-calendar" /> <span> Attendance</span> <span className="menu-arrow" /></a>
                                <ul style={{ display: 'none' }}>
                                    <li><Link to='/'>Attendance</Link></li>
                                </ul>
                            </li>

                            <li className="menu-title">
                                <span>Duplicates</span>
                            </li>
                            <li className="submenu">
                                <a href="##"><i className="fa fa-boxes" /> <span> Duplicates</span> <span className="menu-arrow" /></a>
                                <ul style={{ display: 'none' }}>
                                    <li><Link to="/find-duplicates">Duplicates</Link></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
           // </Router>
        )
    }
}
