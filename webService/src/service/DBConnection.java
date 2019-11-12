package service;

import java.sql.Connection;
import java.sql.DriverManager;


public class DBConnection
{
    //URL de connexion
    private String url = "jdbc:mysql://localhost:3306/mglsi_news?useUnicode=true&useJDBCCompliantTimezoneShift=true&useLegacyDatetimeCode=false&serverTimezone=UTC";
    //Nom du utilisateur
    private String user = "root";
    //Mot de passe de l'utilisateur
    private String password = "";
    //Objet Connection
    private static Connection connect;

    private DBConnection()
    {
        try
        {
            //Class.forName("com.mysql.cj.jdbc.Driver");
            connect = DriverManager.getConnection(url, user, password);
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
    }

    public static Connection getInstance()
    {
        if(connect == null)
        {
            new DBConnection();
            System.out.println("Nouvelle connexion créée...");
        }

        return connect;
    }
}
