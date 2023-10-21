import React, { useState, useEffect } from 'react';
import axios from 'axios';

const AttendanceList = () => {
    const [attendanceData, setAttendanceData] = useState([]);

    useEffect(() => {
        // Fetch attendance data from the backend
        const fetchAttendanceData = async () => {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/attendance-all');
                setAttendanceData(response.data.attendances);
                console.log(response.data.attendances);
            } catch (error) {
                console.error('Error fetching attendance data:', error);
            }
        };

        fetchAttendanceData();
    }, []);

    const calculateTotalWorkingHours = (start, end) => {
        const startTime = new Date(start).getTime();
        const endTime = new Date(end).getTime();
        const totalMilliseconds = endTime - startTime;
        const totalHours = totalMilliseconds / (1000 * 60 * 60);
        return totalHours.toFixed();
    };

    return (
        <>
            <div className="page-header">
                <div className="row">
                    <div className="col-sm-12">
                        <h3 className="page-title">Attendance</h3>
                        <ul className="breadcrumb">
                            <li className="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li className="breadcrumb-item active">Attendance</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div className="row">
                <div className="col-md-12">
                    <div className="table-responsive">
                        <table className='table table-striped custom-table datatable'>
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Total Working Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                                {attendanceData && attendanceData.map((item,index) => (
                                    <tr key={item.id}>
                                        <td>{index+1}</td>
                                        <td>{item.employee?.name}</td>
                                        <td>{item.start_time ? item.start_time : 'N/A'}</td>
                                        <td>{item.end_time ? item.end_time : 'N/A'}</td>
                                        <td>
                                            {item.start_time && item.end_time
                                                ? calculateTotalWorkingHours(item.start_time, item.end_time)
                                                : 'N/A'}
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </>
    );
};

export default AttendanceList;
