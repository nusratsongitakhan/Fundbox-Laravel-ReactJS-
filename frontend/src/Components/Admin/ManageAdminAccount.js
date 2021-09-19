import React from 'react'
import axios from 'axios';
import { Link } from "react-router-dom";
import { useState,useEffect } from 'react';
import { useHistory } from "react-router-dom";
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

const ManageAdminAccount = () => {
    const history = useHistory();
    const [user, setUser] = useState({
        name:'',
        phone:'',
        password:'',
        con_pass:''
    });
    const [msg, setMsg] = useState(" ");
    const handleInput = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setUser({  ...user,[name]: [value]})
        console.log(name, value);
        
    }
    const createUser = async (e) => {
        e.preventDefault();
        const name =user.name.toString();
        const phone =user.phone.toString();
        const password =user.password.toString();
        const con_pass =user.con_pass.toString();
        const res = await axios.post(`http://localhost:8000/api/admin/ManageProfile/${id}`, { name: name,phone:phone,password:password,con_pass:con_pass});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setUser({ 
                name:'',
                phone:'',
                password:'',
                con_pass:''
            })
        }
        else if (res.data.status === 240) {
            setMsg(res.data.message);
        }
        else {
            setMsg(res.data.message);
        }
    }

    const [userEmail, setUserEmail] = useState("");
    const [id, setId] = useState("");
    const [username, setUsername] = useState("");

    function setUserDat(){
        let data = sessionStorage.getItem('userData');
        data = JSON.parse(data);
        if(data === null){
            setTimeout(() => { history.push('/login'); }, 0);
        }else{
            setUserEmail(data.email)
            setUsername(data.username)
            setId(data.id)
        }
    }
    useEffect(() => {
        setUserDat();  
    }, []);

    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main>
                        <div className="col-sm-12 offset-sm-0">
                            <div className="card">
                                <div className="card-header" style={{ "padding" :"5px"}}>
                                    <h4 className="card-title"> Manage Account </h4>
                                </div>
                                <div className="card-content">
                                    <div className="card-body">  
                                        <form onSubmit={createUser} >               
                                            <div className="row">

                                                <div className="col-12 col-sm-12 col-lg-12" >
                                                    <div className="container" style={{ "paddingBottom" :"30px"}}>
                                                        <div className="">
                                                                <div className="osahan-slider-item mx-2">
                                                                    <img style={{ "width":"100%","height":"300px","background-color" :"#ffffff","object-fit":"contain"}} src={process.env.PUBLIC_URL + '/assets/img/avatar.png'} className="img-fluid mx-auto rounded promo-slider" alt="Responsive image" />
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div className="col-12 col-sm-12 col-lg-6">
                                                    <input type="text" className="form-control" name="username" value={username} placeholder="username" readOnly />
                                                </div>
                                                <div className="col-12 col-sm-12 col-lg-6">
                                                    <input type="text" className="form-control" name="email" value={userEmail} placeholder="email"  readOnly/>
                                                </div>
                                            
                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <input type="text" className="form-control" name="name" placeholder="Name" onChange={handleInput} required/>
                                                </div>
                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <input type="number" className="form-control" name="phone" placeholder="Phone number" onChange={handleInput} required/>
                                                </div>

                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <input type="password" className="form-control" name="password" placeholder="Password" onChange={handleInput}/>
                                                </div>

                                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                                    <input type="password" className="form-control" name="con_pass" placeholder="Confirm Password" onChange={handleInput}/>
                                                </div>
                                                

                                                <div className="col-12 col-sm-12" style={{ "marginTop" :"20px"}}>
                                                    <button type="submit" className="btn btn-block btn-success glow">Submit</button>
                                                </div>
                                                <h4 className="card-title" style={{ "padding" :"5px"}}>{msg} </h4>
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
export default ManageAdminAccount;