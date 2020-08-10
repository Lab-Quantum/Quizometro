import React, {useState} from "react";
import {BrowserRouter} from 'react-router-dom';

import Logo from "./assets/QuantumLogo.png";

import Slide from '@material-ui/core/Slide';

import Routes from './routes.js';

import "./app.css";

function App() {
  const [splash, setSplash] = useState(true)
  return (
    <BrowserRouter>
      <div className="App">
        {splash ? (
          <header className="App-header">
            <img onClick={() => setSplash(false)} src={Logo} alt="Quantum Logo" />
          </header>
        ) : (
          <Slide direction="up" in={setSplash} mountOnEnter unmountOnExit>
            <div className="content">
            <Routes />
            </div> 
          </Slide>
        )
      }
      </div>
    </BrowserRouter>
  );
}

export default App;
