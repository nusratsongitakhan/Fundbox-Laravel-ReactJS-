import React from 'react'
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';
import { useState } from 'react';
import { useAxios } from './useAxios';
import { Link } from 'react-router-dom';
import { useParams } from 'react-router';
import axios from 'axios';
import { useHistory } from "react-router-dom";
import { useEffect } from "react";
 const Review = () => {
    const { id: eid } = useParams();
    const history = useHistory();
    const [review, setReview] = useState({
        user_id: 1,
        event_id: '',  
        message: '',
        status : 1
        
    });
    const [msg, setMsg] = useState(" ");
    const change = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setReview({  ...review,[name]: value})
        console.log(name, value);
        
    }


    const onSubmit = async (e) => {
      
        e.preventDefault();
        
        const event_id = eid;
       
        const user_id =review.user_id.toString();
        
        const message =review.message.toString();
        const status = review.status.toString();

        const sendReviews={user_id: user_id,event_id: event_id, message:message,status : status};
        console.log(sendReviews);
        // const response = await axios.post("http://localhost:8000/api/user/report", { event_id: event_id,user_id: user_id,user_name: user_name,details: details,status : status});
        
        
        
       
            const response = await axios.post("http://localhost:8000/api/user/review",sendReviews );
            console.log(response)
            if(response.data.status === 19){
                alert(response.data.message);
                setReview({  user_id: 1,
                    event_id: '',  
                    message: '',
                    status : 1})
                setTimeout(() => { history.push(`/user/review/${eid}`); }, 3000);
                 
            }
            else if (response.data.error === 400) {
                alert(response.data.status);
            }
            else{
                alert("Something went wrong!");

            setReview({   user_id: 1,
                event_id: '',  
                message: '',
                status : 1})
            }
        
    
    }


    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
            <div className="row">
            <div className="col-2 mt-1 mb-2">
                <UserMenuBar/>
            </div>
            <div className="col-10 mt-1 mb-2" >
                <div id="layoutSidenav_content">
                    <main className="bodyBoxShadow">
                    <div className="app-content content">
        <div className="content-overlay"></div>
        <div className="content-wrapper">
            <div className="content-body">
                <section id="widgets-Statistics">
                    <div className="row">
                        <div className="col-11 mt-1 mb-2">
                            <h4>Review</h4>
                           
                        </div>

                        <div className="col-1 mt-1 mb-2">
                        <Link to="/user/events" className="btn btn-primary foat-end">Back</Link>  
                        </div>
                        <hr/>
                    </div>

                    <form onSubmit={onSubmit}>

                        {/* @csrf */}


                                <input type="hidden" className="form-control"  name="event_id" value={eid} onChange={change}/>
                        
                            
                            <div className="form-floating">
                                <textarea className="form-control" placeholder="Write details here..." name="message" value={review.message} onChange={change} style={{height: 100}}></textarea>

                            </div>

                            <div className="col-12">
                                <button type="submit" className="btn btn-outline-primary">Submit</button>
                            </div>
                    </form>
                </section>
            </div>
        </div>
        </div>
        </main>
    </div>
                        
 
                </div>
                </div>
            </div>
            </div>
    )
    
 
}
export default Review;