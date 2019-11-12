package serveur;

import javax.xml.ws.Endpoint;

import service.UserService;

public class ServeurSoap {

	
		public static void main(String[] args)
	    {
			String url = "http://localhost:3000/";
	        Endpoint.publish(url, new UserService());

	        System.out.println("le serveur à demarré "+ url);
	    }

}
