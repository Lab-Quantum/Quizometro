import React, {useState} from "react";
import Logo from "./assets/QuantumLogo.png";

import Slide from '@material-ui/core/Slide';

import "./app.css";

function App() {
  const [splash, setSplash] = useState(true)
  return (
    <div className="App">
      {splash ? (
        <header className="App-header">
          <img onClick={() => setSplash(false)} src={Logo} alt="Quantum Logo" />
        </header>
      ) : (
        <Slide direction="up" in={setSplash} mountOnEnter unmountOnExit>
          <div className="content">
            Router Component Here  
          </div> 
        </Slide>
      )
    }
    </div>
  );
}

export default App;
