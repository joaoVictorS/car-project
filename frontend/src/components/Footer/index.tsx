// src/components/Footer.jsx
import React from 'react';
import { Box, Typography } from '@mui/material';

const Footer = () => {
  return (
    <Box
      component="footer"
      sx={{
        py: 2,
        textAlign: 'center',
        backgroundColor: '#f5f5f5',
        width: '100%',
        position: 'fixed',
        bottom: 0,
        boxShadow: '0px 0px 5px 0px rgba(0,0,0,0.2)',
      }}
    >
      <Typography variant="body1">
        &copy; {new Date().getFullYear()} My Application
      </Typography>
    </Box>
  );
};

export default Footer;
