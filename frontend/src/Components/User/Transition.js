


const Transition = ({eventId, amount, visibleType,paymentType,status, created_at})=>{
    return(
        

          
            <tr>
                <td>{eventId}</td>
                <td>{amount}</td>
                <td>{visibleType}</td>
                <td>{paymentType}</td>
                <td>{status}</td>
                <td>{created_at}</td>                  
            </tr>                  
       
    );
}

export default Transition;



