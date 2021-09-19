import React from 'react'
import axios from 'axios';
import { Link } from "react-router-dom";
import { useState,useEffect } from 'react';
import { useHistory } from "react-router-dom";

const Signup = () => {
    const history = useHistory();
    const [user, setUser] = useState({
        signup_name: '',
        signup_username:'',
        signup_email:'',
        signup_password:'',
        signup_con_password:'',
        signup_phone:''
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
        const signup_name = user.signup_name.toString();
        const signup_username =user.signup_username.toString();
        const signup_email =user.signup_email.toString();
        const signup_password =user.signup_password.toString();
        const signup_con_password =user.signup_con_password.toString();
        const signup_phone =user.signup_phone.toString();
        const res = await axios.post('http://localhost:8000/api/SignUp', { signup_name: signup_name,signup_username: signup_username,signup_email:signup_email,signup_password:signup_password,signup_con_password:signup_con_password,signup_phone:signup_phone});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setUser({ 
                signup_name: '',
                signup_username:'',
                signup_email:'',
                signup_password:'',
                signup_con_password:'',
                signup_phone:''
            })
            setTimeout(() => { history.push('/index'); }, 1000);
            
        }
        else if (res.data.status === 240) {
            setMsg(res.data.message);
            setUser({ 
                signup_username:''
            })
        }
        else {
            setMsg(res.data.message);
            setUser({ 
                signup_username:''
            })
        }
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

    return (
        <div className="col-sm-8 offset-sm-2" style={{ "marginTop" :"50px"}}>

            <div className="sb-sidenav-footer">
                <a href="/index" className=""><span></span> <span className="d-none d-md-inline-block"> Back to Home</span></a>
            </div>
            <div className="card">
                <div className="card-header" style={{ "padding" :"5px"}}>
                    <h4 className="card-title">Create New Account </h4>
                </div>
                <div className="card-content">
                    <div className="card-body">  
                        <form onSubmit={createUser} >
                                            
                            <div className="row">
                                <div className="col-12 col-sm-12 col-lg-6">
                                    <input type="text" className="form-control" name="signup_name" placeholder="Full Name" onChange={handleInput} required />
                                </div>
                                <div className="col-12 col-sm-12 col-lg-6">
                                    <input type="text" className="form-control" name="signup_username" placeholder="Username" onChange={handleInput} required/>
                                </div>
                            
                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                    <input type="email" className="form-control" name="signup_email" placeholder="Email" onChange={handleInput} required/>
                                </div>
                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                    <input type="number" className="form-control" name="signup_phone" placeholder="Phone number" onChange={handleInput} required/>
                                </div>

                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                    <input type="password" className="form-control" name="signup_password" placeholder="Password" onChange={handleInput} required/>
                                </div>

                                <div className="col-12 col-sm-12 col-lg-6" style={{ "marginTop" :"10px"}}>
                                    <input type="password" className="form-control" name="signup_con_password" placeholder="Confirm Password" onChange={handleInput} required/>
                                </div>
                                

                                <div className="col-12 col-sm-12" style={{ "marginTop" :"20px"}}>
                                    <button type="submit" className="btn btn-block btn-success glow">Submit</button>
                                </div>
                                <h4 className="card-title" style={{ "padding" :"5px"}}>{msg} </h4>
                            </div>
                        </form>

                        <div style={{ "marginTop" :"20px"}}>
                            <div className="small">Already Have an Account?</div>
                            <a href="/login" className=""><span></span> <span className="d-none d-md-inline-block"> Login</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>           
    )
}
export default Signup;