import React from 'react'
import UserMenuBar from './UserMenuBar';
import TopNavbar from './TopNavBar';
import { useState } from 'react';
import { useEffect } from "react";
import { Link } from 'react-router-dom';
import axios from 'axios';
import { useHistory } from "react-router-dom";
const Events= ()=>{


    
    const [list, setEvents] = useState([]);
    const [eventCategorys, setEventCategorys] = useState([]);
    const history = useHistory();
    const [categorys, setCategory] = useState({selectedCategory: '' });

   
    const [search, setSearch] = useState({
       
        eventSearch: '' 
    
        
    });

    const categoryChange = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setCategory({  ...categorys,[name]: value})
        console.log(name, value);
        
    }

    const searchChange = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setSearch({  ...search,[name]: value})
        console.log(name, value);
        
    }
   


    const onSearch = async (e) => {
      
        e.preventDefault();
        
        
       
        const eventSearch =search.eventSearch.toString();
        
      
        const sendSearch={eventSearch: eventSearch};
        console.log(sendSearch);
        // const response = await axios.post("http://localhost:8000/api/user/report", { event_id: event_id,user_id: user_id,user_name: user_name,details: details,status : status});
        
        
        
       
            const response = await axios.post("http://localhost:8000/api/user/search",sendSearch );
            console.log(response)
            if(response.data.status === 19){

                setEvents(response.data.events);
                setCategory({    selectedCategory: '' });
                setTimeout(() => { history.push("/user/events"); }, 3000);
                 
            }
            else{
                alert("Something went wrong!");

                setCategory({   selectedCategory: '' })
            }
        
    
    }
    const onCategory = async (e) => {
      
        e.preventDefault();
  
       
        const selectedCategory =categorys.selectedCategory.toString();
        const sendSelectedCategory={selectedCategory: selectedCategory};
        console.log(sendSelectedCategory);
        // const response = await axios.post("http://localhost:8000/api/user/report", { event_id: event_id,user_id: user_id,user_name: user_name,details: details,status : status});
        
        
        
       
            const response = await axios.post("http://localhost:8000/api/user/CategoryWiseEvent",sendSelectedCategory );
            console.log(response)
            if(response.data.status === 19){

                setEvents(response.data.events);
                setSearch({    eventSearch: '' });
                setTimeout(() => { history.push("/user/events"); }, 3000);
                 
            }
            else{
                alert("Something went wrong!");

                setSearch({  eventSearch: '' })
            }
        
    
    }








   
    const getData = async ()=>{
        const response = await axios.get("http://localhost:8000/api/user/events"); 
        console.log(response.data.events);
        console.log(response.data.eventCategorys);
        if (response.data.status === 19) {
           
            setEvents(response.data.events);
            setEventCategorys(response.data.eventCategorys);
             
        }
        else{
            alert("Data not found");
        }
      
    }

    useEffect(()=>{
        getData();
    }, [])






    const event = list.filter(event => event.eventType === 1);

    return(

<div className="sb-nav-fixed">
            <TopNavbar url="#!"/>
            <div id="layoutSidenav">
            <div className="row">
            <div className="col-2 mt-1 mb-2">
                <UserMenuBar/>
            </div>
            <div className="col-10 mt-1 mb-2">
                <div id="layoutSidenav_content">
                    <main className="bodyBoxShadow">
                    <div>
                <div className="app-content content">
                        <div className="content-overlay"></div>
                        <div className="content-wrapper">
                            <div className="content-body">
                                <section id="widgets-Statistics">



                       

                                    <div className="row">
                                        <div className="col-11 mt-1 mb-2">
                                            <h4>Events</h4>
                                            
                                        </div>
                                        <div className="col-1 mt-1 mb-2">
                                        <Link to="/user/home" className="btn btn-primary foat-end">Back</Link>  
                                        </div>
                                        <hr/>
                                    </div>


                    <form onSubmit={onCategory}>   
                      
                        {/* @csrf */}
                        <div className="row">
                        <div className="col-10 mt-1 mb-2">

                            <select className="form-select form-control" name="selectedCategory" value={categorys.selectedCategory} onChange={categoryChange} aria-label="Default select example">
                                <option selected>Category</option>
                                {
                                eventCategorys.map((category)=>{
                                    return <option value={category.id}>{category.name}</option>
                                })
                               }

                               
                            </select>
                            </div>

                            
                                    <div className="col-2 mt-1 mb-2">
                                        <button type="submit" className="btn btn-primary ">Sort</button>
                                    </div>
                       
                            </div> 
                         
                            </form>
                          

                <form onSubmit={onSearch} >
                   {/* @csrf */}
                    <div className="row">
                        <div className="col-10 mt-1 mb-2">
                        <input type="text" className="form-control" id="inputAddress" name="eventSearch" value={search.eventSearch} onChange={searchChange} placeholder="Search event here..."/>
                        </div>

                        <div className="col-2 mt-1 mb-2">
                        <button type="submit" className="btn btn-outline-primary">Search</button>
                        </div>
                    </div>
                    </form>

                
                                    <div className="row">

                                                    {
                                                            event.map((event)=>{
                                                            return (
                                                                
                                                            
                                                                <div className="col-lg-3 col-sm-6 col-12 dashboard-users-danger">
                                                                    <div className="card text-center">
                                                                        <div className="card-content">
                                                                        <img src={"http://localhost:8000"+event.image} className="card-img-top" alt="..."/>
                                                                            <div className="card-body py-1">
                                                                                <div className="badge-circle badge-circle-lg badge-circle-light-warning mx-auto mb-50">
                                                                                    <i className="bx bx-receipt font-medium-5"></i>
                                                                                </div>
                                                                                <h5 className="card-title">{event.event_name}</h5>
                                                                                <p className="card-text">{event.details}</p>
                                                                                
                                                                                {/* <a href="{{ URL::to('/example2/'.base64_encode($organizationEvent->id).'/'.base64_encode($organizationEvent->orgId)) }}" class="btn btn-primary">Donate Now</a> */}
                                                                                
                                                                                
                                                                                    
                                                                                <Link to={`/user/review/${event.id}`} className="btn btn-primary btn-sm foat-end">Review</Link>               
                                                                                <Link to={`/user/report/${event.id}`} className="btn btn-primary btn-sm foat-end">Report</Link>   
                                        
                                                                                {/* <a href="/user/review/{event.id}" className="btn btn-primary btn-sm">Review</a>
                                                                                <a href="/user/report/{event.id}" className="btn btn-primary btn-sm">Report</a>  */}
                                        
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            
                                                            );
                                                            })
                                                        }
                                                    
                                                        

                                    </div>
                                </section>
                                
                            
                            </div>
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


export default Events;