import React from 'react';

export class NewsList extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            news: []
        };
    }

    componentDidMount() {
        fetch('/api/news')
            .then(res =>
                res.json()
            )
            .then((resp) => {
                this.setState({
                    news: resp
                })
            })
            .catch(error => {
                console.log(error)
            })

    }

    render() {
        const news1 = this.state.news;
        return (
            <div>
                {
                    news1.map(e => (
                        <p>{e.name}</p>
                    ))
                }
            </div>
        )
    }
}


