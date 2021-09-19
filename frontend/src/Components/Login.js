import React from 'react'
import axios from 'axios';
import { Link } from "react-router-dom";
import { useState,useEffect} from 'react';
import { useHistory } from "react-router-dom";

const Login = () => {
    const history = useHistory();
    const [event, setEvent] = useState({
        login_email: '',
        login_password: ''
    });
    const [msg, setMsg] = useState(" ");
    const handleInput = (e) => {
        const name = e.target.name;
        const value = e.target.value;
        setEvent({  ...event,[name]: [value]})
        console.log(name, value);
        
    }

    function checkUserActive(){
        let data = sessionStorage.getItem('userData');
        data = JSON.parse(data);
        if(data != null){

            if (data.type === 1) {
                setTimeout(() => { history.push('/admin/dashboard'); }, 0);
            }else if (data.type === 2) {
                setTimeout(() => { history.push('/organization'); }, 0);
            }else if (data.type === 3) {
                setTimeout(() => { history.push('/sp/dashboard'); }, 0);
            }else if (data.type === 4) {
                setTimeout(() => { history.push('/user/dashboard'); }, 0);
            }else{
                setTimeout(() => { history.push('/login'); }, 0);
            }
        }
    }

    useEffect(() => {
        checkUserActive();  
    }, []);

    function setDate(userData){
        // localStorage.setItem('userData',JSON.stringify(userData));
        sessionStorage.setItem('userData',JSON.stringify(userData))
    }

    function getUserData(){
        // let data = localStorage.getItem('userData');
        let setData = sessionStorage.getItem('userData');
        // console.log(JSON.parse(data))
        console.log(JSON.parse(setData))
    }

    const loginUser = async (e) => {
        e.preventDefault();
        const login_email = event.login_email.toString();
        const login_password =event.login_password.toString();
        const res = await axios.post('http://localhost:8000/api/login', { login_email: login_email,login_password: login_password});
        if (res.data.status === 200) {
            setDate(res.data.userData)
            console.log(res.data.message);
            //console.log(res.data.userData);
            setMsg(res.data.message);
            setEvent({ 
                login_email: '',
                login_password: ''
            })

            if (res.data.userData.type === 1) {
                setTimeout(() => { history.push('/admin/dashboard'); }, 0);
            }else if (res.data.userData.type === 2) {
                setTimeout(() => { history.push('/organization'); }, 0);
            }else if (res.data.userData.type === 3) {
                setTimeout(() => { history.push('/sp/dashboard'); }, 0);
            }else if (res.data.userData.type === 4) {
                setTimeout(() => { history.push('/user/dashboard'); }, 0);
            }
        }
        else if (res.data.status === 240) {
            setMsg(res.data.message);
            setEvent({ 
                login_email: '',
                login_password: ''
            })
        }
        else {
            setMsg(res.data.message);
            setEvent({ 
                login_email: '',
                login_password: ''
            })
        }
    }
    return (
        <div className="col-sm-6 offset-sm-3" style={{ "marginTop" :"50px"}}>
            <div className="sb-sidenav-footer">
                <a href="/index" className=""><span></span> <span className="d-none d-md-inline-block"> Back to Home</span></a>
            </div>
            <div className="card">
                <div className="card-header" style={{ "padding" :"5px"}}>
                    <h4 className="card-title">Welcome Back! <br/> Login </h4>
                    <h4 className="card-title">{msg} </h4>
                </div>
                <div className="card-content">
                    <div className="card-body">  
                        <form onSubmit={loginUser} >
                                            
                            <div className="row">
                                <div className="col-12 col-sm-12 col-lg-12">
                                    <input type="text" className="form-control" name="login_email" placeholder="Email" onChange={handleInput} required/>
                                </div>
                                <div className="col-12 col-sm-12 col-lg-12" style={{ "marginTop" :"10px"}}>
                                    <input type="password" className="form-control" name="login_password" placeholder="Password" onChange={handleInput} required/>
                                </div>

                                <div className="col-12 col-sm-12" style={{ "marginTop" :"10px"}}>
                                    <button type="submit" className="btn btn-block btn-success glow">LOGIN</button>
                                </div>
                            </div>
                        </form>

                        <div style={{ "marginTop" :"20px"}}>
                            <div className="small">Hey! Don't Have an Account yet?</div>
                            <a href="/signup" className=""><span></span> <span className="d-none d-md-inline-block"> Sign Up</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>              
    )
}
export default Login;