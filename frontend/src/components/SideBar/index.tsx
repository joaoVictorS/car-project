// src/components/Sidebar.jsx
import React from 'react';
import { Drawer, List, ListItem, ListItemText } from '@mui/material';
import { Link } from 'react-router-dom';

const Sidebar = () => {
  return (
    <Drawer
      variant="permanent"
      sx={{
        width: 240,
        flexShrink: 0,
        [`& .MuiDrawer-paper`]: { width: 240, boxSizing: 'border-box' },
      }}
    >
      <List  sx={{ marginTop:10, marginLeft:2 }} >
        <ListItem button component={Link} to="/">
          <ListItemText primary="Home" />
        </ListItem>
        {/* Adicione mais itens de menu conforme necessário */}
      </List>
    </Drawer>
  );
};

export default Sidebar;
