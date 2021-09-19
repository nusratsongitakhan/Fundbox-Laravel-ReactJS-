import { useEffect } from "react";
import axios from 'axios';

export const useAxios = (url, callback)=>{

    const getData = async ()=>{
        const response = await axios.get(url); 
        console.log(response.data.list);
        if (response.data.status === 19) {
           
            callback(response.data.list);
             
        }
        else{
            alert("Data not found");
        }
      
    }

    useEffect(()=>{
        getData();
    }, [])
}





