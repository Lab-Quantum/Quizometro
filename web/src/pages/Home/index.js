import React from 'react';
import './home.css'

import CardQuizFeed from '../../components/CardQuizFeed'

import { Scrollbars } from 'react-custom-scrollbars';

const Home = () => {
    return (
        <div className="home">
            <div className="head">
                <div className="container">
                    <div className="textHeader">Find a job<br/>That's just right</div>
                    <div className="buttonContainer">
                        <div className="button">View all</div>
                    </div>
                </div>
            </div>
            <div className="feedCards">
                <div className="container">
                    <CardQuizFeed/>
                    <CardQuizFeed/>
                    <CardQuizFeed/>
                    <CardQuizFeed/>
                    <CardQuizFeed/>
                    <CardQuizFeed/>
                </div>
            </div>
        </div>
    );
}

export default Home;