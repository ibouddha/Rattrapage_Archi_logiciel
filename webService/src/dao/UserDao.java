package dao;


import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

import domaine.Users;
import service.DBConnection;

public class UserDao 
{
   
    private Connection connection;
    private PreparedStatement statement = null;
    private ResultSet result = null;



    String addQuery = "INSERT INTO users(nom, prenom, email, password) VALUES (?, ?, ?, ?)";
    String allQuery = "SELECT * FROM users";
    String userLogin = "SELECT * FROM users WHERE email = ? and password = ?";
    String updateQuery = "update users set nom = ?, prenom = ?, email = ? where iduser = ?";
    String deleteQuery = "delete from users where iduser = ?";


    public void addUser(Users user)
    {
        try
        {
            connection = DBConnection.getInstance();
            statement = connection.prepareStatement(addQuery);
            statement.setString(1, user.getNom());
            statement.setString(2, user.getPrenom());
            statement.setString(3, user.getEmail());
            statement.setString(4, user.getPassword());

            statement.executeUpdate();
        }
        catch (Exception e)
        {
            System.out.println("Erreur lors de l'ajout "+e.getMessage());
        }
    }

    public Users userLogin(String email, String password)
    {
        Users user = null;
        try
        {
            connection = DBConnection.getInstance();
            statement = connection.prepareStatement(userLogin);
            statement.setString(1, email);
            statement.setString(2, password);
            result = statement.executeQuery();

            if(result.next())
            {
                user = new Users();
                user.setId(result.getInt("iduser"));
                user.setNom(result.getString("nom"));
                user.setPrenom(result.getString("prenom"));
                user.setEmail(result.getString("email"));
                user.setPassword(result.getString("password"));
                user.setToken(result.getString("token"));
            }


        }
        catch (Exception e)
        {
            System.out.println("login DAO error");
        }

        return user;
    }


    public void updateUser(Users user)
    {
        try
        {
            connection = DBConnection.getInstance();
            statement = connection.prepareStatement(updateQuery);
            statement.setString(1, user.getNom());
            statement.setString(2, user.getPrenom());
            statement.setString(3, user.getEmail());
            statement.setInt(4, user.getId());

            statement.executeUpdate();
        }
        catch (Exception e)
        {
            System.out.println(e.getMessage());
        }
    }

    public void deleteUser(int iduser)
    {
        try
        {
            connection = DBConnection.getInstance();
            statement = connection.prepareStatement(deleteQuery);
            statement.setInt(1, iduser);
            statement.executeUpdate();
        }
        catch (Exception e)
        {
            System.out.println(e.getMessage());
        }
    }


    public ArrayList<Users> getAllUser()
    {
        ArrayList<Users> allUser = new ArrayList<Users>();

        try
        {
            connection = DBConnection.getInstance();
            statement = connection.prepareStatement(allQuery);
            result = statement.executeQuery();

            while(result.next())
            {
                Users user = new Users();
                user.setNom(result.getString("nom"));
                user.setPrenom(result.getString("prenom"));
                user.setEmail(result.getString("email"));

                allUser.add(user);
            }
        }
        catch (Exception e)
        {
            System.out.println("Errur serveur " + e.getMessage());
        }

        return allUser;
    }

}