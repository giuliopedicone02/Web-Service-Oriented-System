package film;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/film")
public class esame extends HttpServlet {

    private Connection connection;

    @Override
    public void init() {
        final String CONNECTION_STRING = "jdbc:mysql://localhost:3306/FilmDatabase";
        final String username = "root";
        final String password = "Giulio2002!";

        try {
            connection = DriverManager.getConnection(CONNECTION_STRING, username, password);
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();

        out.println(("""
                    <html>
                        <head>
                            <title> Catalogo Film </title>
                        </head>
                        <body>
                            <h1> <center> Film Database </center> </h1>
                """));

        String query = "SELECT * FROM Film";

        out.println("<h3> Lista Film </h3>");

        try (Statement stmt = connection.createStatement()) {
            ResultSet result = stmt.executeQuery(query);

            while (result.next()) {

                int anno = Integer.parseInt(result.getString("anno_uscita"));

                out.println("<br/>");
                out.println("<b> Nome Film: </b> " + result.getString("nome_film"));
                out.println("<b> Nome Regista: </b> " + result.getString("nome_regista"));
                if (anno >= 2008) {
                    out.println("<b> Anno di uscita: </b> <span style='color:green'>" + anno + "</span>");
                } else {
                    out.println("<b> Anno di uscita: </b> <span style='color:red'>" + anno + "</span>");
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }

        out.println("<h3> Aggiungi un nuovo film </h3>");

        out.println("""
                    <form action="/film" method="post">
                        <span> Inserisci nome film: </span>
                        <input type="text" name="nome" placeholder="Nome Film" required><br/>
                        <span> Inserisci nome regista: </span>
                        <input type="text" name="regista" placeholder="Nome Regista" required><br/>
                        <span> Inserisci anno: </span>
                        <input type="number" name="anno" placeholder="Anno" required><br/>
                        <input type="submit" name="action" value="Invia">
                    </form>
                """);
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        String richiesta = request.getParameter("action");

        // POST
        if (richiesta.equals("Invia")) {

            String nome = request.getParameter("nome");
            String regista = request.getParameter("regista");
            int anno = Integer.parseInt(request.getParameter("anno"));

            String query = "INSERT INTO Film(nome_film, nome_regista, anno_uscita) VALUES (?, ?, ?)";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setString(2, regista);
                stmt.setInt(3, anno);

                int rows = stmt.executeUpdate();
                out.println("Inserimento riuscito. Righe modificate: " + rows);
            } catch (SQLException e) {
                e.printStackTrace();
            }

            out.println("<br/> <a href='/film'> Torna alla Home </a>");
        }

        // Delete
        if (richiesta.equals("Elimina")) {

        }
    }

    @Override
    public void destroy() {
        try {
            connection.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
