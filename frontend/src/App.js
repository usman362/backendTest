import './App.css';
import FindDuplicates from './FindDuplicates';
import AttendanceList from './components/Attendance';
import Header from './components/Header';
import Sidebar from './components/Sidebar';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom'; // Import BrowserRouter and Routes

function App() {
  return (
    <>
      <Router>
      <Header />
        <Sidebar />
        <div className="page-wrapper">
          <div className="content container-fluid">
            <Routes> {/* Use the Routes component */}
              <Route exact path='/' element={<AttendanceList />} /> {/* Use the "element" prop for component */}
              <Route path='/find-duplicates' element={<FindDuplicates />} /> {/* Use the "element" prop for component */}
            </Routes>
          </div>
        </div>
      </Router>
    </>
  );
}

export default App;
