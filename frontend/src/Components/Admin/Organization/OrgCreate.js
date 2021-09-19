import React from 'react'
import axios from 'axios';
import { useState } from 'react';
import { useHistory } from "react-router-dom";
import LeftNavBar from '../Layout/LeftNavBar';
import TopNavbar from '../Layout/TopNavbar';

const OrgCreate = () => {
    const history = useHistory();
    const [event, setEvent] = useState({
        org_name: '',
        org_details: '',
        phone: '',
        address: '',
        status: '1'
    });
    const [msg, setMsg] = useState("");
    const handleInput = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setEvent({  ...event,[name]: [value]})
        console.log(name, value);
        
    }
    const createOrg = async (e) => {
        e.preventDefault();
        const org_name = event.org_name.toString();
        const org_details =event.org_details.toString();
        const phone =event.phone.toString();
        const address =event.address.toString();
        const status =event.status.toString();
        const res = await axios.post('http://localhost:8000/api/admin/createOrg', { org_name:org_name,org_details:org_details,phone: phone,address:address,status: status});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setEvent({ 
                org_name: '',
                org_details: '',
                phone: '',
                address: '',
                status: '1'
            })
            setTimeout(() => { history.push('/admin/orgManage'); }, 300);
        }
        else if (res.data.status === 240) {
            setMsg(res.data.message);
            setEvent({ 
                org_name: '',
                org_details: '',
                phone: '',
                address: '',
                status: '1'
            })
        }
        else {
            setMsg(res.data.message);
            setEvent({ 
                org_name: '',
                org_details: '',
                phone: '',
                address: '',
                status: '1'
            })
        }
    }

    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main>
                        <div className="col-sm-10 offset-sm-1" style={{ "marginTop" :"50px"}}>
                            <div className="card">
                                <div className="card-header" style={{ "padding" :"5px"}}>
                                    <h4 className="card-title">Create New Organizaition </h4>
                                </div>
                                <div className="card-content">
                                    <div className="card-body">  
                                        <form onSubmit={createOrg} >
                                                            
                                            <div className="row">
                                                <div className="col-12 col-sm-12 col-lg-12">
                                                    <input type="text" className="form-control" name="org_name" onChange={handleInput} placeholder="Organisation Name" required />
                                                </div>
                                                
                                                    <div className="col-12 col-sm-12" style={{ "marginTop" :"10px"}}>
                                                    <fieldset className="form-group">
                                                        <textarea className="form-control" name="org_details" id="basicTextarea" onChange={handleInput} rows="3" placeholder="Details" required></textarea>
                                                    </fieldset>
                                                </div>

                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <input type="text" className="form-control" name="phone" placeholder="Phone" onChange={handleInput} required />
                                                </div>
                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <input type="text" className="form-control" name="address" placeholder="Address" onChange={handleInput} required />
                                                </div>
                                            
                                                <div className="col-12 col-sm-12 col-lg-12" style={{ "marginTop" :"10px"}}>
                                                    <fieldset className="form-group">
                                                        <select name="status" className="form-control" id="basicSelect" onChange={handleInput} required>
                                                            <option disabled>Select Status</option>
                                                            <option value="1">Active</option>
                                                            <option value="2">Deactivate</option>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div className="col-12 col-sm-12" style={{ "marginTop" :"10px"}}>
                                                    <button type="submit" className="btn btn-block btn-success glow">Add</button>
                                                </div>

                                                <h4 className="card-title" style={{ "padding" :"10px"}}>{msg} </h4>
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
export default OrgCreate;