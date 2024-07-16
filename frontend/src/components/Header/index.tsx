import React from 'react';
import { AppBar, Toolbar, Typography } from '@mui/material';

const Header = () => {
  return (
    <AppBar position="fixed" sx={{ zIndex: 1300 }} >
      <Toolbar>
        <Typography variant="h6" noWrap component="div">
          My Application
        </Typography>
      </Toolbar>
    </AppBar>
  );
};

export default Header;
