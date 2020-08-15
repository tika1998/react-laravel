import React from 'react';
import ReactDOM from 'react-dom';
import {  Link } from 'react-router-dom';

export class Example extends React.Component {
    render() {
        return (
            <div>
                <Link to={'/news'}>News</Link>
            </div>
        );
    }
}
// if (document.getElementById('root')) {
//     ReactDOM.render(<Example />, document.getElementById('root'));
// }
