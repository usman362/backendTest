import React from 'react';

class FindDuplicates extends React.Component {
    state = {
        array: [2, 3, 1, 2, 3],
        duplicates: [],
    };

    componentDidMount() {
        this.findDuplicates(this.state.array);
    }

    findDuplicates = (arr) => {
        const frequencyMap = {};
        const result = [];

        // Count the frequency of each element
        arr.forEach((num) => {
            frequencyMap[num] = (frequencyMap[num] || 0) + 1;
        });

        // Add elements occurring more than once to the result list
        for (const num in frequencyMap) {
            if (frequencyMap[num] > 1) {
                result.push(parseInt(num));
            }
        }

        this.setState({ duplicates: result });
    };

    render() {
        return (
            <>
                <div className="page-header">
                    <div className="row">
                        <div className="col-sm-12">
                            <h3 className="page-title">Duplicates</h3>
                            <ul className="breadcrumb">
                                <li className="breadcrumb-item"><a href="##">Dashboard</a></li>
                                <li className="breadcrumb-item active">Duplicates</li>
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
                                        <th>Duplicates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {this.state.duplicates.map((num, index) => (
                                        <tr>
                                            <td>{index + 1}</td>
                                            <td key={index}>{num}</td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </>
        );
    }
}

export default FindDuplicates;
