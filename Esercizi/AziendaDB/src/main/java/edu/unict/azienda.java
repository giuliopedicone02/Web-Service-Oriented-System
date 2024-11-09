package main.java.edu.unict;

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

@WebServlet("/azienda")
public class azienda extends HttpServlet {
    private Connection connection;
    private static final String CONNECTION_STRING = "jdbc:mysql://localhost:3306/AziendaDB?user=root&password=Giulio2002!";

    @Override
    public void init() {
        try {
            connection = DriverManager.getConnection(CONNECTION_STRING);
        } catch (SQLException e) {
        }
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><center><h1>Azienda - Melo Fuccio e Sergio Mancini</h1></center><br>");
        out.println("<body><h1>Lista dei dipendenti:</h1>");

        String query = "SELECT * FROM Dipendenti";
        try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {
            while (result.next()) {
                out.println("<br>");
                out.println("Nome: " + result.getString("Nome"));
                out.println("Cognome: " + result.getString("Cognome"));
                out.println("Ruolo: " + result.getString("Ruolo"));
                out.println("Stipendio: " + result.getString("Stipendio"));
            }
        } catch (Exception e) {
        }

        out.println("<br><h1>Aggiungi un nuovo dipendente</h1>");
        out.println("<form action='/azienda' method='post'>");
        out.println("<input type='text' name='Nome' placeholder='Inserire nome' required>");
        out.println("<input type='text' name='Cognome' placeholder='Inserire cognome' required>");
        out.println("<input type='text' name='Ruolo' placeholder='Inserire ruolo' required>");
        out.println("<input type='number' name='Stipendio' placeholder='Inserire stipendio' required>");
        out.println("<input type='submit' value='Invia'>");
        out.println("</form>");
        out.println("</body></html>");
    }

    @Override
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String nome = request.getParameter("Nome");
        String cognome = request.getParameter("Cognome");
        String ruolo = request.getParameter("Ruolo");
        int stipendio;

        try {
            stipendio = Integer.parseInt(request.getParameter("Stipendio"));
        } catch (NumberFormatException e) {
            out.write("Errore: Stipendio deve essere un numero intero.");
            return;
        }

        String query = "INSERT INTO Dipendenti (Nome, Cognome, Ruolo, Stipendio) VALUES (?, ?, ?, ?)";

        try (PreparedStatement stmt = connection.prepareStatement(query)) {
            stmt.setString(1, nome);
            stmt.setString(2, cognome);
            stmt.setString(3, ruolo);
            stmt.setInt(4, stipendio);

            int rows = stmt.executeUpdate();
            out.write("Dipendente aggiunto con successo. Righe modificate: " + rows);
        } catch (Exception e) {
            out.write("Errore durante l'inserimento del dipendente.");
        }

        out.write("<br><a href='/azienda'>Torna alla Home</a>");
    }

    @Override
    public void destroy() {
        try {
            if (connection != null && !connection.isClosed()) {
                connection.close();
            }
        } catch (SQLException e) {
        }
    }
}