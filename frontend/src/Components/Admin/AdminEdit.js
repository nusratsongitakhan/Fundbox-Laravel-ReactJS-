import React from 'react'
import axios from 'axios';
import { Link } from 'react-router-dom';
import { useState, useEffect } from 'react';
import { useParams } from "react-router";
import { useHistory } from "react-router-dom";
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

const AdminEdit = () => {
    const history = useHistory();
    const [user, setUser] = useState({
        editName: '',
        editEmail:'',
        editPhone:''
    });
    const [msg, setMsg] = useState(" ");
    const handleInput = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setUser({  ...user,[name]: [value]})
        console.log(name, value);
        
    }
    const { id: id } = useParams();
    const [fullName, setFullName] = useState("");
    const [email, setEmail] = useState("");
    const [phone, setPhone] = useState("");
    const mount= async()=>{
        const res = await axios.get(`http://localhost:8000/api/admin/getSingleAdminData/${id}`);
        console.log(res.data);
        console.log(res.data.name);
        console.log(res.data.status);
        setFullName(res.data.name);
        setEmail(res.data.email);
        setPhone(res.data.phone);

        if (res.status === 200) {
            setUser(res.data)
            
        }
            
    }
     useEffect(() => {
    mount();  
     }, []);
    
    const updateAdmin = async (e) => {
        e.preventDefault();
        const editName = user.editName.toString();
        const editEmail =user.editEmail.toString();
        const editPhone =user.editPhone.toString();
        const res = await axios.post(`http://localhost:8000/api/admin/manageAdmin/updateUserInfo/${id}`, { editName: editName,editEmail:editEmail,editPhone:editPhone});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setUser({ 
                editName: '',
                editEmail: '1',
                editPhone:''
            })
            
             setTimeout(() => { history.push('/admin/manageAdmin'); }, 200);
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
                        <div className="class-header" style={{ "padding" :"5px"}}>
                            <h4>
                            <Link to={'/admin/manageAdmin'} className="btn btn-primary btn-sm foat-end"> Back</Link>
                            </h4>
                            <h4> Edit Admin</h4>
                            <h4 className="card-title">{msg} </h4>
                        </div>
                        <div className="container" style={{ "marginTop" :"50px"}}>
                            <div className="row">
                                <div className="col-md-12">
                                    <div className="card">
                                        <div className="class-body"></div>
                                        <form onSubmit={updateAdmin}>
                                            <div className="row">
                                                <div className="col-12 col-sm-12 col-lg-12">
                                                    <label>Full Name</label>
                                                    <input type="text" className="form-control" name="editName" placeholder={fullName} onChange={handleInput} required />
                                                </div>
                                                
                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <label>Email</label>
                                                    <input type="email" className="form-control" name="editEmail" placeholder={email} onChange={handleInput} required/>
                                                </div>
                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <label>Phone</label>
                                                    <input type="number" className="form-control" name="editPhone" placeholder={phone} onChange={handleInput} required/>
                                                </div>
                                                
                                                <div className="form-group mb-3"style={{ "marginTop" :"10px"}}>
                                                <button type="submit" className="btn btn-primary">Save</button>
                                                </div>
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
export default AdminEdit