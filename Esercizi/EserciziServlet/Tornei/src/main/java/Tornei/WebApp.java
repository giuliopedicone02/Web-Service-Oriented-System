package Tornei;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/tornei")
public class WebApp extends HttpServlet {

    private Connection connection;

    public void init() {
        final String connection_string = "jdbc:mysql://localhost:3306/Tornei";
        final String username = "root";
        final String password = "Giulio2002!";

        try {
            connection = DriverManager.getConnection(connection_string, username, password);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("""
                <html>
                    <head> <title> Tornei </title> </head>
                    <body>
                        <h1> <center> Tornei di Calcio in JDBC </center> </h1>
                """);

        out.println("<h3> Tornei di calcio: </h3>");

        String query = "SELECT * FROM tournaments";
        try (PreparedStatement stmt = connection.prepareStatement(query)) {
            ResultSet result = stmt.executeQuery();

            while (result.next()) {
                out.println("<br/>");
                out.println("<form action='/tornei' method='post'>");
                out.println("<input type='hidden' name='id' value='" + result.getInt("id") + "'>");
                out.println("<input type='hidden' name='nome' value='" + result.getString("name") + "'>");
                out.println("<input type='hidden' name='logo' value='" + result.getString("logo") + "'>");
                out.println("<input type='hidden' name='champion' value='" + result.getString("champion") + "'>");
                out.println("<input type='hidden' name='anno' value='" + result.getInt("year") + "'>");

                out.println("<b> Nome </b>: " + result.getString("name") + "<br/>");
                out.println("<b> Champion </b>: " + result.getString("champion") + "<br />");
                out.println("<b> Anno </b>: " + result.getString("year") + "<br/>");
                out.println("<a href= '" + result.getString("logo") + "'> Link Immagine </a> <br/>");
                out.println("<img width='100px' height='100px' src='" + result.getString("logo") + "'> <br/> ");
                out.println("<input type='submit' name='action' value='Modifica'>");
                out.println("<input type='submit' name='action' value='Elimina'>");
                out.println("</form>");

            }

            out.println("<h3> Inserisci un nuovo torneo: </h3>");

            out.println("<form action='/tornei' method='post'>");
            out.println("<span> Inserisci nome: </span>");
            out.println("<input type='text' name='nome' placeholder='Inserisci nome'> <br>");
            out.println("<span> Inserisci logo: </span>");
            out.println("<input type='text' name='logo' placeholder='Inserisci URL logo'> <br>");
            out.println("<span> Inserisci Champion: </span>");
            out.println("<input type='text' name='champion' placeholder='Inserisci champion'> <br>");
            out.println("<span> Inserisci anno: </span>");
            out.println("<input type='number' name='anno' placeholder='Inserisci anno'> <br>");
            out.println("<input type='submit' name='action' value='Invia'>");
            out.println("</form>");

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String azione = request.getParameter("action");

        if (azione.equals("Invia")) {
            String nome = request.getParameter("nome");
            String logo = request.getParameter("logo");
            String champion = request.getParameter("champion");
            int anno = Integer.parseInt(request.getParameter("anno"));

            String query = "INSERT INTO tournaments(name, logo, champion, year) VALUES (?,?,?,?)";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setString(2, logo);
                stmt.setString(3, champion);
                stmt.setInt(4, anno);

                int rows = stmt.executeUpdate();

                out.println("Inserimento avvenuto con successo. Righe modificate: " + rows);
            } catch (SQLException e) {
                out.println("Errore durante l'inserimento");
                e.printStackTrace();
            }

            out.println("<br> <a href='/tornei'> Torna alla Home </a>");

        }

        if (azione.equals("Elimina")) {
            int id = Integer.parseInt(request.getParameter("id"));

            String query = "DELETE FROM tournaments WHERE id = ?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setInt(1, id);
                out.println("<br> <a href='/tornei'> Torna alla Home </a>");

                int rows = stmt.executeUpdate();

                out.println("Eliminazione avvenuta con successo. Righe modificate: " + rows);
            } catch (SQLException e) {
                out.println("Errore durante la cancellazione");
                e.printStackTrace();
            }

            out.println("<br> <a href='/tornei'> Torna alla Home </a>");
        }

        if (azione.equals("Modifica")) {
            int id = Integer.parseInt(request.getParameter("id"));
            String nome = request.getParameter("nome");
            String logo = request.getParameter("logo");
            String champion = request.getParameter("champion");
            int anno = Integer.parseInt(request.getParameter("anno"));

            out.println("<h3> Modifica un torneo: </h3>");

            out.println("<form action='/tornei' method='post'>");

            out.println("<input type='hidden' name='id' value='" + id + "'>");
            out.println("<span> Modifica nome: </span>");
            out.println("<input type='text' name='nome' value='" + nome + "'>");
            out.println("<span> Modifica logo: </span>");
            out.println("<input type='text' name='logo' value='" + logo + "'>");
            out.println("<span> Modifica Champion: </span>");
            out.println("<input type='text' name='champion' value='" + champion + "'>");
            out.println("<span> Modifica anno: </span>");
            out.println("<input type='number' name='anno' value='" + anno + "'>");
            out.println("<input type='submit' name='action' value='Update'>");
            out.println("</form>");
        }

        if (azione.equals("Update")) {
            int id = Integer.parseInt(request.getParameter("id"));
            String nome = request.getParameter("nome");
            String logo = request.getParameter("logo");
            String champion = request.getParameter("champion");
            int anno = Integer.parseInt(request.getParameter("anno"));

            String query = "UPDATE tournaments SET name=?, logo=?, champion=?, year=? WHERE id = ?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setString(2, logo);
                stmt.setString(3, champion);
                stmt.setInt(4, anno);
                stmt.setInt(5, id);

                int rows = stmt.executeUpdate();

                out.println("Modifica avvenuta con successo. Righe modificate: " + rows);
            } catch (SQLException e) {
                out.println("Errore durante l'inserimento");
                e.printStackTrace();
            }

            out.println("<br> <a href='/tornei'> Torna alla Home </a>");

        }
    }

    public void destroy() {
        try {
            connection.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}