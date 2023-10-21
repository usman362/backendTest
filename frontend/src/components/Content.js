import React, { Component } from 'react';
import AttendanceList from './Attendance';
import FindDuplicates from '../FindDuplicates';

export default class Content extends Component {
    render() {
        return (
            <div className="page-wrapper">
                <div className="content container-fluid">
                    <FindDuplicates/>
                </div>
            </div>
        )
    }
}
