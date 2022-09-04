package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;
import entidades.Material;

public class MateriaisDao {

    public static List<Material> getMateriais(int inicio, int total) {
        
        List<Material> list = new ArrayList<Material>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT * FROM material ORDER BY id LIMIT " + (inicio - 1) + ", " + total);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Material material = new Material();
                material.setId(rs.getInt("id"));
                material.setNome(rs.getString("nome"));
                material.setMetaBonificacaoKg(rs.getDouble("meta_bonificacao_kg"));
                material.setPrecoCompraKg(rs.getDouble("preco_compra_kg"));
                material.setPrecoVendaKg(rs.getDouble("preco_venda_kg"));
                list.add(material);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }
    public static int getContagem() {
        int contagem = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT count(*) AS contagem FROM material");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                contagem = rs.getInt("contagem");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return contagem;
    }
}
