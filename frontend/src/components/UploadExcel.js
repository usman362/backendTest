import React, { useState } from 'react';
import '../App.css';
import axios from 'axios';

const FileUpload = () => {
    const [file, setFile] = useState(null);

    const handleFileChange = (e) => {
        setFile(e.target.files[0]);
    };

    const handleUpload = () => {
        const formData = new FormData();
        formData.append('file', file);

        axios.post('http://127.0.0.1:8000/api/upload-attendance', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
            .then((response) => {
                // Handle successful upload
                console.log(response.data);
            })
            .catch((error) => {
                // Handle errors
                console.error('Error uploading file: ', error);
            });
    };

    return (
        <div className="container">
            <div className="row filter-row mt-4">
                <div className="col-sm-10">
                    <div className="form-group custom-select">
                        <input type="file" className='form-control' onChange={handleFileChange} />
                    </div>
                </div>
                <div className="col-sm-2">
                    <button className='btn btn-success w-100 upload-btn' onClick={handleUpload}>Upload</button>
                </div>
            </div>
        </div>
    );
};

export default FileUpload;
