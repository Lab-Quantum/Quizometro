import React from 'react'
import './cardQuizFeed.css'

import Avatar from '@material-ui/core/Avatar';

const CardQuizFeed = () =>{
    return(
        <div className="cardQuizFeed">
            <div className="content">
                <div className="cardHeader">
                    <Avatar alt="Gilberto Barros" src="/broken-image.jpg" />
                    <div className="textInfos">
                        <div className="nameUser">Gilberto Barros</div>
                        <div className="activity">12 Testes</div>
                    </div>
                </div>
                <div className="testeTitle">
                    Titulo do teste
                </div>
                <div className="tagContainer">
                    <div className="tag">
                        <div className="icon"></div>
                        <div className="tagTitle">Tag Title</div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default CardQuizFeed;