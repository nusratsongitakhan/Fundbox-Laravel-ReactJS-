import React from 'react'
import axios from 'axios';
import { useParams } from "react-router";
import { useHistory } from "react-router-dom";
import { Link } from 'react-router-dom';
import LeftNavBar from './Layout/LeftNavBar';
import TopNavbar from './Layout/TopNavbar';

const DeleteCategory = () => {
    const history = useHistory();
    const { id: cat_id } = useParams();
    
    const deleteEvent = async (e) => {
        const thidClickedFunda = e.currentTarget;
        thidClickedFunda.innerText = "Deleting";
        const res = await axios.post('http://localhost:8000/api/admin/eventCategory/delete', { cat_id: cat_id});
        if (res.data.status ===200) {
            console.log(res.data.message);
            setTimeout(() => { history.push('/admin/category'); }, 100);
        }else if(res.data.status === 240){
            console.log(res.data.message);
        }else{
            console.log(res.data.message);
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
                            <div className="col-sm-6 offset-sm-3" style={{ "marginTop" :"50px"}}>
                                <div className="alert alert-danger" role="alert">
                                    Are You Sure You Want to Delete Category
                                    <br />
                                    <br />
                                    <button className="btn btn-danger btn-sm foat-end" onClick={deleteEvent}>Delete</button>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        
    )
}
export default DeleteCategory