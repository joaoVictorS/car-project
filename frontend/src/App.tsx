import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Layout from './components/Layout';
import Home from './pages/Home';
import Login from './components/Login';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/login" element={<Login />} />
        <Route path="/" element={<Layout />}>
          <Route path="/home" element={<Home />} />
          {/* Adicione mais rotas que utilizam o Layout conforme necessário */}
        </Route>
      </Routes>
    </Router>
  );
}
export default App;
