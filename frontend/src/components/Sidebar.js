import React, { Component } from 'react';

export default class Sidebar extends Component {
    render() {
        return (
            <div className="sidebar" id="sidebar">
                <div className="sidebar-inner slimscroll">
                    <div id="sidebar-menu" className="sidebar-menu">
                        <ul>
                            <li className="menu-title">
                                <span>Attendance</span>
                            </li>
                            <li className="submenu">
                                <a href="javascript:void(0)"><i className="la la-dashboard" /> <span> Attendance</span> <span className="menu-arrow" /></a>
                                <ul style={{ display: 'none' }}>
                                    <li><a className="active" href="javscript:void(0)">Attendance</a></li>
                                </ul>
                            </li>

                            <li className="menu-title">
                                <span>Duplicates</span>
                            </li>
                            <li className="submenu">
                                <a href="javascript:void(0)"><i className="la la-dashboard" /> <span> Duplicates</span> <span className="menu-arrow" /></a>
                                <ul style={{ display: 'none' }}>
                                    <li><a className="active" href="javscript:void(0)">Duplicates</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        )
    }
}
