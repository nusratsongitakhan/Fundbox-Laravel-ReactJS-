import LeftNavBar from './LeftNavBar';
import TopNavbar from './TopNavbar';
import React from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';
import { useHistory } from "react-router-dom";

const ListOfAdvertise = () => {
    let serial = 0;
    const [getAllAdd, setGetEvent] = useState([]);
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/sp/allAdvertiser');
        console.log(res.data);
        if (res.status === 200) {
            setGetEvent(res.data)
        }
    }

    useEffect(() => {
        mount();    
    }, []);

    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                                getAllAdd.map((e) => {
                                    return (
                                        <tr key={e.id} >
                                            <td>{serial += 1}</td>
                                            <td>
                                                {e.title} <br/>
                                            </td>
                                            <td>
                                                {e.status}
                                            </td>
                                            <td>
                                                 {e.created_at}
                                            </td>
                                    </tr>
                                    );
                                })
                            }
                        </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </div>

    )
}

export default ListOfAdvertise
