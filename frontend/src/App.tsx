import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Layout from './components/Layout';
import Home from './pages/Home';
import Login from './components/Login';
import Page2 from './pages/page2';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Login />} />        
          <Route path="/Home" element={<Layout><Home /></Layout>} />
          <Route path="/page2" element={<Layout><Page2 /></Layout>} />
      </Routes>
    </Router>
  );
}
export default App;
