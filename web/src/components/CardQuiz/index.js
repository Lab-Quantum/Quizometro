import React from 'react'
import './cardQuiz.css'

import Button from '@material-ui/core/Button';

const CardQuiz = () => {
    return(
        <div className="cardQuiz">
            <div className="identifier">1</div>
            <div className="pictureContainer">
                <img className="QuizImage" src="https://i1.wp.com/bastidoresdatv.com.br/wp-content/uploads/2014/05/gilberto-barros.jpg" alt="Quiz Picture" />
            </div>
            <div className="questionText">Quem é este deus?</div>
            <div className="alternatives">
                <div className="alternative">
                    <Button fullWidth variant="contained" disableElevation>Preta Gil</Button>
                </div>
                <div className="alternative">
                    <Button fullWidth variant="contained" disableElevation>Niki Lauda</Button>
                </div>
                <div className="alternative">
                    <Button fullWidth variant="contained" disableElevation>Gilberto Barros</Button>
                </div>
                <div className="alternative">
                    <Button fullWidth variant="contained" disableElevation>Cabeção da Malhação</Button>
                </div>
            </div>
        </div>
    )
}

export default CardQuiz