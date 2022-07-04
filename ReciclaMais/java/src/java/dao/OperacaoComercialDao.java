package dao;

import entidades.OperacaoComercial;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

public class OperacaoComercialDao {

    public static int inserirCompra(OperacaoComercial operacaoComercial) {
        int idOperacaoComercial = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO operacao_comercial(id_catador,tipo,total) VALUES(?,'c',?)", Statement.RETURN_GENERATED_KEYS);
            ps.setInt(1, operacaoComercial.getCatador().getId());
            ps.setDouble(2, operacaoComercial.getTotal());
            ps.executeUpdate();

            ResultSet chaveGerada = ps.getGeneratedKeys();
            if (chaveGerada.next()) {
                idOperacaoComercial = chaveGerada.getInt(1);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return idOperacaoComercial;
    }
}
