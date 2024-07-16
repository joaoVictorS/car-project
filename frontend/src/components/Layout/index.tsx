import { Box, CssBaseline } from '@mui/material';
import Header from '../Header';
import Sidebar from '../SideBar';
import Footer from '../Footer';

const Layout = ({ children }: { children: React.ReactNode }) => {
    return (
        <Box sx={{ display: 'flex', flexDirection: 'column', height: '100vh' }}>
          <CssBaseline />
          <Header />
          <Box sx={{ display: 'flex', flexGrow: 1 }}>
            <Sidebar />
            <Box component="main" sx={{ flexGrow: 1, p: 3, marginTop: '64px', marginLeft: '240px' }}>
              {children}
            </Box>
          </Box>
          <Footer />
        </Box>
      );
};

export default Layout;
