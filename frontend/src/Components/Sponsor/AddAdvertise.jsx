import LeftNavBar from './LeftNavBar';
import TopNavbar from './TopNavbar';
import React from 'react'
import axios from 'axios';
//import { Link } from "react-router-dom";
import { useState} from 'react';
import { useHistory } from "react-router-dom";

function AddAdvertise() {

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
    const addAdvertise = async (e) => {
        e.preventDefault();
        const advertise_title = user.advertise_title.toString();
        const image =user.image.toString();
        console.log("Title : "+advertise_title);
        console.log("Banner : "+image);
        
        const res = await axios.post('http://localhost:8000/api/sp/addAdvertise', { advertise_title: advertise_title});
        if (res.data.status === 200) {
            console.log(res.data.message);
            setMsg(res.data.message);
            setBanner({ 
                advertise_title: '',
                image:''
            })
            setTimeout(() => { history.push('/sp/allAdvertiser'); }, 500);
            
        }
        else if (res.data.status === 240) {
            setMsg(res.data.message);
            setBanner({ 
                advertise_title:'',
                image:''
            })
        }
        else {
            setMsg(res.data.message);
            setBanner({ 
                advertise_title:'',
                image:''
            })
        }
    }
    return (
        <div className="sb-nav-fixed">
            <TopNavbar/>
            <div id="layoutSidenav">
                <LeftNavBar/>
                <div id="layoutSidenav_content">
                    <main className="containerNew">
                        
                        <form onSubmit={addAdvertise} >
                            <h3>Add Advertise</h3>
                            <div className="form-group">
                                <input type="text" className="form-control" name="advertise_title"  placeholder="Enter a Title" onChange={handleInput} />
                                <small className="form-text text-muted">Please add e proper title</small>
                            </div>
                            <div className="form-group">
                                <input type="file" className="form-control" name="image" onChange={handleInput}/>
                                <small className="form-text text-muted"></small>
                            </div>
                            <button type="submit" style={{"marginTop" : "15px"}} className="btn btn-primary">Submit</button>
                            <h4 className="card-title" style={{ "padding" :"5px"}}>{msg} </h4>
                        </form>

                    </main>
                </div>
            </div>
        </div>
    )
}

export default AddAdvertise
