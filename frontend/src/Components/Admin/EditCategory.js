import React from 'react'
import axios from 'axios';
import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';
import { useParams } from "react-router";
import { useHistory } from "react-router-dom";
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

const EditEvent = () => {
    const history = useHistory();
    const [event, setEvent] = useState({
        category_name: '',
        status: '1'
    });
    const [msg, setMsg] = useState("");
    const { id: id } = useParams();
    const [ename, seteName] = useState("");
    const mount= async()=>{
        const res = await axios.get(`http://localhost:8000/api/admin/eventCategory/singleCategory/${id}`);
        console.log(res.data);
        console.log(res.data.name);
        console.log(res.data.status);
        seteName(res.data.name);

        if (res.status === 200) {
            setEvent(res.data)
            
        }
            
    }
    useEffect(() => {
        mount();  
    }, []);
    
    const handleInput = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setEvent({ ...event, [name]: [value] })
        console.log(name,value);
    }
    const updateEvent = async (e) => {
        e.preventDefault();
        const category_name = event.category_name.toString();
        const status =event.status.toString();
        const res = await axios.post(`http://localhost:8000/api/admin/eventCategory/update/${id}`, { category_name: category_name,category_status: status});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setEvent({ 
                category_name: '',
                status: '1',
            })
            
             setTimeout(() => { history.push('/admin/category'); }, 1000);
        }else{
            console.log(res.data.message);
            setMsg(res.data.message);
        }
    }
    return (
        <div className="sb-nav-fixed">
                <TopNavbar/>
                <div id="layoutSidenav">
                    <LeftNavBar/>
                    <div id="layoutSidenav_content">
                        <main>
                            <div className="card-header" style={{ "padding" :"5px"}}>
                                <h4>
                                    <Link to={'/admin/category'} className="btn btn-primary btn-sm foat-end"> Back</Link>
                                </h4>
                            </div>
                            <div className="container" style={{ "marginTop" :"50px"}}>
                                <div className="row">
                                    <div className="col-md-12">
                                        <div className="card">
                                            <div className="class-header">
                                                <h4> Edit Category
                                                </h4>
                                                <h4 className="card-title">{msg} </h4>
                                            </div>
                                            <form onSubmit={updateEvent}>
                                                <div className="col-12 col-sm-12 col-lg-12">
                                                    <label > Event Name</label>
                                                    <input type="text" name="category_name" onChange={handleInput} className="form-control" placeholder={ename} />
                                                </div>

                                                <div className="col-12 col-sm-12 col-lg-12" style={{ "marginTop" :"10px"}}>
                                                    <fieldset className="form-group">
                                                        <select name="status" value={event.status} className="form-control" id="basicSelect" onChange={handleInput} required>
                                                            <option disabled defaultValue>Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Deactivate</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            
                                                <div className="col-12 col-sm-12 col-lg-12" style={{ "marginTop" :"10px","marginBottom" :"10px"}}>
                                                <button type="submit" className="btn btn-primary">Save Category</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </main>
                    </div>
                </div>
            </div>
    )
}
export default EditEvent