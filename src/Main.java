import org.json.*;

public class Main
{
    public static void main(String[] args_)
    {
	     String username = "sandbox";
	     String apiKey   = "3732296ffe47f8a2aa469bdac4c5703c546f90d84f2dc3aee7a4d5c7fedceb13";
	
	     String recipients = "+2349033363227";
	
	     String message = "I am a fisherman. I sleep all day and work all night!";
	     
	     // ShortCode
	     String from = "59777";
	
	     AfricasTalkingGateway gateway  = new AfricasTalkingGateway(username, apiKey, "sandbox");
	     
	    try {
	        JSONArray results = gateway.sendMessage(recipients, message, from);
			
	        for( int i = 0; i < results.length(); ++i ) {
		          JSONObject result = results.getJSONObject(i);
		          System.out.print(result.getString("status") + ",");
		          System.out.print(result.getString("number") + ",");
		          System.out.print(result.getString("messageId") + ",");
		          System.out.println(result.getString("cost"));
	    }
   	}
   	
   	catch (Exception e) {
	    System.out.println("Encountered an error while sending " + e.getMessage());
	    }
	
   }
}
