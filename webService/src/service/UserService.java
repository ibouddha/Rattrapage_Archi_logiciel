package service;

import java.util.ArrayList;
import java.util.List;

import javax.jws.WebParam;
import javax.jws.WebService;

import domaine.Users;
import dao.UserDao;

@WebService(serviceName = "UserService")


public class UserService
{
    private static ArrayList<Users> users = new ArrayList<Users>();
    UserDao userDAO = new UserDao();


    public Users userLogin(
            @WebParam(name = "login") String login,
            @WebParam(name = "password") String password)
    {
       return userDAO.userLogin(login, password);
    }



    public List<Users> getAllUser ()
    {
        return userDAO.getAllUser();
    }



    public String addUser(
            @WebParam(name = "nom") String nom,
            @WebParam(name = "prenom") String prenom,
            @WebParam(name = "email") String email,
            @WebParam(name = "password") String password,
            @WebParam(name = "token") String token)
    {
        Users user = new Users(nom, prenom, email, password);
        try
        {
            userDAO.addUser(user);
            return String.format("Utilisateur ajouté avec succès !");
        }
        catch(Exception e)
        {
            return String.format(e.getMessage());
        }

    }

    public String updateUser(
            @WebParam(name = "nom") String nom,
            @WebParam(name = "prenom") String prenom,
            @WebParam(name = "email") String email,
            @WebParam(name = "id") int id)
    {
        Users user = new Users(id, nom, prenom, email);
        try
        {
            userDAO.updateUser(user);
            return String.format("Utilisateur modifié avec succès");
        }
        catch (Exception e)
        {
            return String.format(e.getMessage());
        }
    }

    public String deleteUser(@WebParam(name = "id") int iduser)
    {
        try
        {
            userDAO.deleteUser(iduser);
            return String.format("Utilisateur supprimé !");
        }
        catch (Exception e)
        {
            return String.format(e.getMessage());
        }
    }



	public static ArrayList<Users> getUsers() {
		return users;
	}



	public static void setUsers(ArrayList<Users> users) {
		UserService.users = users;
	}


}
