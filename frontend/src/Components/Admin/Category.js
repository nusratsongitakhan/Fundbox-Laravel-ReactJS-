import React from 'react'
import axios from 'axios';
import { Link } from "react-router-dom";
import { useState,useEffect} from 'react';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';
const Category = () => {
    const [event, setEvent] = useState({
        category_name: '',
        category_status: '1'
    });
    const [msg, setMsg] = useState(" ");
    const handleInput = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setEvent({  ...event,[name]: [value]})
        console.log(name, value);
        
    }
    const addEvent = async (e) => {
        e.preventDefault();
        const category_name = event.category_name.toString();
        const category_status =event.category_status.toString();
        const res = await axios.post('http://localhost:8000/api/admin/eventCategory', { category_name: category_name,category_status: category_status});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setEvent({ 
                category_name: '',
                category_status: '1'
            })
            mount();
            // setTimeout(() => { history.push('/admin/category'); }, 100);
            // 
        }
        else if (res.data.status === 240) {
            setMsg(res.data.message);
            setEvent({ 
                category_name: '',
                category_status: '1'
            })
        }
        else {
            setMsg(res.data.message);
            setEvent({ 
                category_name: '',
                category_status: '1'
            })
        }
    }

    let serial = 0;
    const [getEvent, setGetEvent] = useState([]);
    const mount= async()=>{
        const res = await axios.get('http://localhost:8000/api/admin/eventCategory');
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
                            <div className="col-sm-12 offset-sm-0" style={{ "marginTop" :"0px"}}>
                                <div className="card">
                                    <div className="card-header" style={{ "padding" :"5px"}}>
                                        <h4 className="card-title">Create New Category </h4>
                                        <h4 className="card-title">{msg} </h4>
                                    </div>
                                    <div className="card-content">
                                        <div className="card-body">  
                                            <form onSubmit={addEvent} >
                                                                
                                                <div className="row">
                                                    <div className="col-12 col-sm-12 col-lg-12">
                                                        <input type="text" className="form-control" name="category_name" placeholder="Category Name" onChange={handleInput} required/>
                                                    </div>
                                                    
                                                    <div className="col-12 col-sm-12 col-lg-12" style={{ "marginTop" :"10px"}}>
                                                        <fieldset className="form-group">
                                                            <select name="category_status" className="form-control" id="basicSelect" onChange={handleInput} required>
                                                                <option disabled defaultValue>Select Status</option>
                                                                <option value="1">Active</option>
                                                                <option value="0">Deactivate</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div className="col-12 col-sm-12" style={{ "marginTop" :"10px"}}>
                                                        <button type="submit" className="btn btn-block btn-success glow">Add</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div className="class-body">
                                        <table className="table table-bordered table-striped">
                                            <thead>
                                                
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Category Name</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            {
                                                getEvent.map((e) => {
                                                    return (
                                                        <tr key={e.id} >
                                                            <td>{serial += 1}</td>
                                                            <td>{e.name}</td>
                                                            <td>{e.status === 1 ? 'Active' : 'Deactive'}</td>
                                                            <td>
                                                                {/* <Link to={`edit-student/${e.id}`} className="btn btn-success btn-sm" >Edit</Link> */}
                                                                <Link to={`edit-category/${e.id}`} className="btn btn-primary btn-sm foat-end"> Edit </Link><br />
                                                            </td>
                                                            <td>
                                                                <Link to={`delete-category/${e.id}`} className="btn btn-danger btn-sm foat-end" > Delete </Link>
                                                                {/* <button className="btn btn-danger btn-sm foat-end" onClick={deleteEvent}>Delete</button> */}
                                                            </td>
                                                        </tr>
                                                    );
                                                })
                                            }
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
            )
}
export default Category;