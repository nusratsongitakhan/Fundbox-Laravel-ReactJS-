import LeftNavBar from './LeftNavBar';
import TopNavbar from './TopNavbar';
import React from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';
import { useHistory } from "react-router-dom";

const OngoingEvents = () => {
    let serial = 0;
    const [getAllEvents, setAllEvents] = useState([]);
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/sp/OngoingEvents');
        console.log(res.data);
        if (res.status === 200) {
            setAllEvents(res.data)
        }
    }

    const history = useHistory();
    const [user, setBanner] = useState({
        advertise_title: '',
        image:''
    });
    const [msg, setMsg] = useState(" ");
    const handleInput = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setBanner({  ...user,[name]: [value]})
        console.log(name, value);
    }

    useEffect(() => {
        mount();    
    }, []);

    const applyEvent = async (e) => {
        console.log("ID : "+e);
        
        // const res = await axios.post('http://localhost:8000/api/sp/addAdvertise', { advertise_title: advertise_title});
        // if (res.data.status === 200) {
        //     console.log(res.data.message);
        //     setMsg(res.data.message);
        //     setBanner({ 
        //         advertise_title: '',
        //         image:''
        //     })
        //     setTimeout(() => { history.push('/sp/allAdvertiser'); }, 500);
            
        // }
        // else if (res.data.status === 240) {
        //     setMsg(res.data.message);
        //     setBanner({ 
        //         advertise_title:'',
        //         image:''
        //     })
        // }
        // else {
        //     setMsg(res.data.message);
        //     setBanner({ 
        //         advertise_title:'',
        //         image:''
        //     })
        // }


    }

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
                            <th scope="col">Image</th>
                            <th scope="col">Events Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Target money</th>
                            <th scope="col">Date</th>
                            <th scope="col">Apply</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                                getAllEvents.map((e) => {
                                    const eventImage = '%PUBLIC_URL%' + ' ' ;
                                    return (
                                        <tr key={e.id} >
                                            <td>{serial += 1}</td>
                                            <td>
                                            <img src="https://thehill.com/sites/default/files/styles/article_full/public/ca_internationalwomensday_illustration_istock.jpg?itok=hOev3rFs" class="img-thumbnail" alt="..." />
                                            </td>
                                            <td>
                                                {e.event_name}
                                            </td>
                                            <td>
                                                {e.details}
                                            </td>
                                            <td>
                                                {e.contact} 
                                            </td>
                                            <td>
                                                {e.targetMoney}
                                            </td>
                                            <td>
                                                 {e.created_at}
                                            </td>
                                            <td>
                                            <form onSubmit={applyEvent(e.id)} >
                                            <button type="button" class="btn btn-success">Apply</button>
                                            </form>
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

export default OngoingEvents
